<?php
	require_once("config.php");

    debug($_POST);

    // if(!empty($_POST['region'])){
    //     $sql1 = "SELECT id FROM regions WHERE region = :region";
    //     $stmt1 = $bdd->prepare($sql1);
    //     try{
    //         $stmt1->execute(['region' => $_POST['region']]);
    //         $res1 = $stmt1->fetch();
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }

    // if(!empty($_POST['departement'])){
    //     $sql2 = "SELECT id FROM departements WHERE departement = :departement";
    //     $stmt2 = $bdd->prepare($sql2);
    //     try{
    //         $stmt2->execute(['departement' => $_POST['departement']]);
    //         $res2 = $stmt2->fetch();
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }

    // if(!empty($_POST['villes_id'])){
    //     $sql3 = "SELECT id FROM villes WHERE ville = :ville";
    //     $stmt3 = $bdd->prepare($sql3);
    //     try{
    //         $stmt3->execute(['ville' => $_POST['villes_id']]);
    //         $res3 = $stmt3->fetch();
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }

    // debug($res1);
    // debug($res2);
    // debug($res3);

    $sql = "SELECT * FROM logements";

    $i=0;
    $j=0;
    $z=0;
    foreach($_POST['lieu'] as $k =>$v){
        if(!empty($v)){
            $z++;
        }
    }
    if(!empty($_POST['lieu']['region'])){
        $sql .= " INNER JOIN villes ON logements.villes_id = villes.id";
        $sql .= " INNER JOIN departements ON villes.departements_idDepartements = departements.id";
        $sql .= " INNER JOIN regions ON departements.regions_idRegions = regions.id";
    }elseif(!empty($_POST['lieu']['departement'])){
        $sql .= " INNER JOIN villes ON logements.villes_id = villes.id";
        $sql .= " INNER JOIN departements ON villes.departements_idDepartements = departements.id";
    }elseif(!empty($_POST['lieu']['ville'])){
        $sql .= " INNER JOIN villes ON logements.villes_id = villes.id";
    }

    // if(isset($_POST['equipements_id'])){
    //     $sql .= " INNER JOIN equipe ON logements.id = equipe.logements_id";
    // $j++;
    // }if(isset($_POST['contraintes_id'])){
    //     $sql .= " INNER JOIN contraint ON logements.id = contraint.logements_id";
    // $j++;
    // }
    foreach($_POST as $k => $v){
    //     if($k=='types_idTypes'){
    //         if (!empty($v)){
    //             if($i==0){
    //                 $sql .= " WHERE";
    //             }else{
    //                 $sql .= " AND";
    //             }
    //             $sql .= " $k = $v";
    //             $i++;
    //         }
    //     }elseif($k=='surfaceTotale'){
    //         if(!empty($v)){
    //             if($i==0){
    //                 $sql .= " WHERE";
    //             }else{
    //                 $sql .= " AND";
    //             }
    //             $sql .= " surfaceInterieure + surfaceExterieure >= $v";
    //             $i++;
    //         }
    //     }elseif($k=='capaciteTotale'){
    //         if(!empty($v)){
    //             if($i==0){
    //                 $sql .= " WHERE";
    //             }else{
    //                 $sql .= " AND";
    //             }
    //             $sql .= " nombreLitsSimples + nombreLitsDoubles * 2 >= $v";
    //             $i++;
    //         }
    //     }elseif($k=='region'){
    //         if(!empty($v)){
    //             if($i==0){
    //                 $sql .= " WHERE";
    //             }else{
    //                 $sql .= " AND";
    //             }
    //             $sql .= " ";
    //             $i++;
    //     }elseif($k=='departement'){
    //         if(!empty($v)){
    //             if($i==0){
    //                 $sql .= " WHERE";
    //             }else{
    //                 $sql .= " AND";
    //             }
    //             $sql .= " ";
    //             $i++;
    //     }
    if($k=='lieu'){
        foreach($v as $m => $w){
            if(!empty($w)){
                if($i==0){
                    $sql .= " WHERE";
                }else{
                    $sql .= " AND";
                }
                    $sql .= " $m =";
                    debug($z);
                if($z==1){
                    $sql .= " '".$_POST['lieu'][''.$m.'']."'";
                }else{
                    $sql .= " $m.id";
                    $z--;
                }
                $i++;
            }
        }
    }
        // elseif(!is_array($v)){
    //         if (!empty($v)){
    //             if($i==0){
    //                 $sql .= " WHERE";
    //             }else{
    //                 $sql .= " AND";
    //             }
    //             $sql .= " $k >= $v";
    //             $i++;
    //         }
    //     }elseif($k=='surfaceInterieure' || $k=='surfaceExterieure'){
    //         $h=0;
    //         foreach ($v as $m => $w){
    //             if(!empty($w)){
    //                 if($i==0){
    //                     $sql .= " WHERE";
    //                 }else{
    //                     $sql .= " AND";
    //                 }
    //                 if($h==0){
    //                     $sql .= " $k >= $w";
    //                     $h++;
    //                 }else{
    //                     $sql .= " $k <= $w";
    //                 }
    //                 $i++;
    //             }else{
    //                 $h++;
    //             }
    //         }
    //     }elseif($k=='nombreLitsDoubles' || $k=='nombreLitsSimples'){
    //         $h=0;
    //         foreach ($v as $m => $w){
    //             if(!empty($w)){
    //                 if($i==0){
    //                     $sql .= " WHERE";
    //                 }else{
    //                     $sql .= " AND";
    //                 }
    //                 if($h==0){
    //                     $sql .= " $k >= $w";
    //                     $h++;
    //                 }else{
    //                     $sql .= " $k <= $w";
    //                 }
    //                 $i++;
    //             }else{
    //                 $h++;
    //             }
    //         }
    //     }else{
    //         if($j>0){
    //             foreach ($v as $m => $w){
    //                 if($i==0){
    //                     $sql .= " WHERE";
    //                 }else{
    //                     $sql .= " AND";
    //                 }
    //                 $sql .= " $k = $w";
    //                 $i++;
    //             }
    //         }

    //     }  
    }

    // $sql .= " ORDER BY nombreClick desc";

    // $sql = "SELECT * FROM logements INNER JOIN equipe ON logements.id = equipe.logements_id WHERE logements_id = (SELECT id FROM equipements WHERE equipement = Garage)";
    
    // $sql = "SELECT * FROM logements INNER JOIN villes ON logements.villes_id = villes.id WHERE departements_idDepartements IN (SELECT id FROM departements WHERE departement = '".$_POST['departement']."')";
    // $sql = "SELECT * FROM logements INNER JOIN villes ON logements.villes_id = villes.id WHERE departements_idDepartements IN (SELECT id FROM departements INNER JOIN regions ON departements.regions_idRegions = regions.id WHERE regions_idRegions = IN (SELECT id FROM regions WHERE region = '".$_POST['region']."')";
    debug($sql);


    try{
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

    }catch (PDOException $e) {
        echo $e->getMessage();
    }

    $ligne = $stmt-> fetchAll();
    $nb = $stmt->rowCount();

    debug($ligne);


    if($nb==0){
        include('resultat-recherche4.php');
    }else{
        include('resultat-recherche2.php');
    }
?>