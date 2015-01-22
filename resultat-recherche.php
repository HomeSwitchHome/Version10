<?php
    require_once("config.php");

    // debug($_POST);

    function constructeurCondition($v, $i, $h = null, $sql, $st, $st2 = null, $k, $w = null){
        if (!empty($v)){
            global $i;
            global $h;
            global $sql;
            // debug($k);
            if($i==0){
                $sql .= " WHERE";
            }else{
                $sql .= " AND";
            }
            if($h==0){
                    $sql .= " $st";
                    $h++;
                }else{
                    $sql .= " $st2";
                }
                $i++;
        }else{
            $h++;
        }
    }

    $sql = "SELECT * FROM logements";


    $i=0;
    $j=0;
    $st2='erreur';
    $w='erreur2';
    // $z=0;
    // $vi='villes_id';
    // $de='departements_idDepartements';
    // $re='regions_idRegions';
    // $lo='logements';
    // foreach($_POST['lieu'] as $k =>$v){
    //     if(!empty($v)){
    //         $z++;
    //     }
    // }
    // if(!empty($_POST['lieu']['region'])){
    //     $sql .= " INNER JOIN villes ON logements.$vi = villes.id";
    //     $sql .= " INNER JOIN departements ON villes.$de = departements.id";
    //     $sql .= " INNER JOIN regions ON departements.$re = regions.id";
    // }elseif(!empty($_POST['lieu']['departement'])){
    //     $sql .= " INNER JOIN villes ON logements.$vi = villes.id";
    //     $sql .= " INNER JOIN departements ON villes.$de = departements.id";
    // }elseif(!empty($_POST['lieu']['ville'])){
    //     $sql .= " INNER JOIN villes ON logements.$vi = villes.id";
    // }

    // if(isset($_POST['equipements_id'])){
    //     $sql .= " INNER JOIN equipe ON logements.id = equipe.logements_id";
    // $j++;
    // }if(isset($_POST['contraintes_id'])){
    //     $sql .= " INNER JOIN contraint ON logements.id = contraint.logements_id";
    // $j++;
    // }
    foreach($_POST as $k => $v){
        // if(!is_array($v)){
            // $k = 'default_non_tableau';
        // }
        $h=0;
        switch($k){
            case "types_idTypes":
                $st="$k = $v";
                constructeurCondition($v, $i, $h, $sql, $st, $st2, $k, $w);
                break;
            case "surfaceTotale":
                $st="surfaceInterieure + surfaceExterieure >= $v";
                constructeurCondition($v, $i, $h, $sql, $st, $st2, $k, $w);
                break;
            case "capaciteTotale":
                $st="nombreLitsSimples + nombreLitsDoubles * 2 >= $v";
                constructeurCondition($v, $i, $h, $sql, $st, $st2, $k, $w);
                break;
            // case 'region':
            //     return true;
            //     $st=;
            //     if(!empty($v)){
            //         if($i==0){
            //             $sql .= " WHERE";
            //         }else{
            //             $sql .= " AND";
            //         }
            //         $sql .= " ";
            //         $i++;
            // case 'departement':
            //     return true;
            //     $st=;
            //     if(!empty($v)){
            //         if($i==0){
            //             $sql .= " WHERE";
            //         }else{
            //             $sql .= " AND";
            //         }
            //         $sql .= " ";
            //         $i++;
            //     }
        // if($k=='lieu'){
        //     $u='logements';
        //     foreach($v as $m => $w){
        //         if(!empty($w)){
        //             if($i==0){
        //                 $sql .= " WHERE";
        //             }else{
        //                 $sql .= " AND";
        //             }if($m=='ville'){
        //                 $sql .= " $m.$de =";
        //             }elseif($m=='departement'){
        //                 $sql .= " $m.$re =";
        //             }elseif($m=='region'){
        //                 $sql .= " $m.$re =";
        //             }
        //                 debug($z);
        //             if($z==1){
        //                 $sql .= " '".$_POST['lieu'][''.$m.'']."'";
        //             }else{
        //                 $sql .= " $m.id";
        //                 $z--;
        //             }
        //             $i++;
        //         }
        //     }
        // }
            case 'default_non_tableau':
                $st="$k >= $v";
                constructeurCondition($v, $i, $sql, $st, $k);
            case "surfaceInterieure":
            case "surfaceExterieure":
                foreach ($v as $m => $w){
                    $st="$k >= $w";
                    $st2="$k <= $w";
                    constructeurCondition($w, $i, $h , $sql, $st, $st2 , $k, $w);
                }
            case "nombreLitsDoubles":
            case "nombreLitsSimples":
                foreach ($v as $m => $w){
                    $st="$k >= $w";
                    $st2="$k <= $w";
                    constructeurCondition($w, $i, $h , $sql, $st, $st2 , $k, $w);
                }
                break;
                
            // default:
            //     if($j>0){
            //         foreach ($v as $m => $w){
            //             $st="$k = $w";
            //             constructeurCondition($v, $i, $sql, $st, $k, $w);
            //         }
            //     }
            //     break;
        }  
    }

    $sql .= " ORDER BY nombreClick desc";

    // $sql = "SELECT * FROM logements INNER JOIN equipe ON logements.id = equipe.logements_id WHERE logements_id = (SELECT id FROM equipements WHERE equipement = Garage)";
    
    // $sql = "SELECT * FROM logements INNER JOIN villes ON logements.villes_id = villes.id WHERE departements_idDepartements IN (SELECT id FROM departements WHERE departement = '".$_POST['departement']."')";
    // $sql = "SELECT * FROM logements INNER JOIN villes ON logements.villes_id = villes.id WHERE departements_idDepartements IN (SELECT id FROM departements INNER JOIN regions ON departements.regions_idRegions = regions.id WHERE regions_idRegions = IN (SELECT id FROM regions WHERE region = '".$_POST['region']."')";
    // debug($sql);


    try{
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

    }catch (PDOException $e) {
        echo $e->getMessage();
    }

    $ligne = $stmt-> fetch();
    $nb = $stmt->rowCount();

    // debug($ligne);


    if($nb==0){
        include('resultat-recherche4.php');
    }else{
        include('resultat-recherche2.php');
    }
?>