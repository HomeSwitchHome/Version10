<?php
	require_once("config.php");



    $sql = "SELECT * FROM logements";

    $i=0;
    $j=0;
    if(isset($_POST['equipements_id'])){
        $sql .= " INNER JOIN equipe ON logements.id = equipe.logements_id";
    $j++;
    }if(isset($_POST['contraintes_id'])){
        $sql .= " INNER JOIN contraint ON logements.id = contraint.logements_id";
    $j++;
    }
    foreach($_POST as $k => $v){
        if($k=='types_idTypes'){
            if (!empty($v)){
                if($i==0){
                    $sql .= " WHERE";
                }else{
                    $sql .= " AND";
                }
                $sql .= " $k = $v";
                $i++;
            }
        }elseif($k=='surfaceTotale'){
            if(!empty($v)){
                if($i==0){
                    $sql .= " WHERE";
                }else{
                    $sql .= " AND";
                }
                    $sql .= " surfaceInterieure + surfaceExterieure >= $v";
                $i++;
            }
        }elseif($k=='capaciteTotale'){
            if(!empty($v)){
                if($i==0){
                    $sql .= " WHERE";
                }else{
                    $sql .= " AND";
                }
                    $sql .= " nombreLitsSimples + nombreLitsDoubles * 2 >= $v";
                $i++;
            }
        }elseif(!is_array($v)){
            if (!empty($v)){
                if($i==0){
                    $sql .= " WHERE";
                }else{
                    $sql .= " AND";
                }
                $sql .= " $k >= $v";
                $i++;
            }
        }elseif($k=='surfaceInterieure' || $k=='surfaceExterieure'){
            $h=0;
            foreach ($v as $m => $w){
                if(!empty($w)){
                    if($i==0){
                        $sql .= " WHERE";
                    }else{
                        $sql .= " AND";
                    }
                    if($h==0){
                        $sql .= " $k >= $w";
                        $h++;
                    }else{
                        $sql .= " $k <= $w";
                    }
                    $i++;
                }else{
                    $h++;
                }
            }
        }elseif($k=='nombreLitsDoubles' || $k=='nombreLitsSimples'){
            $h=0;
            foreach ($v as $m => $w){
                if(!empty($w)){
                    if($i==0){
                        $sql .= " WHERE";
                    }else{
                        $sql .= " AND";
                    }
                    if($h==0){
                        $sql .= " $k >= $w";
                        $h++;
                    }else{
                        $sql .= " $k <= $w";
                    }
                    $i++;
                }else{
                    $h++;
                }
            }
        }else{
            if($j>0){
                foreach ($v as $m => $w){
                    if($i==0){
                        $sql .= " WHERE";
                    }else{
                        $sql .= " AND";
                    }
                    $sql .= " $k = $w";
                    $i++;
                }
            }

        }  
    }

    $sql .= " ORDER BY nombreClick desc";



    try{
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

    }catch (PDOException $e) {
        echo $e->getMessage();
    }

    $ligne = $stmt-> fetch();
    $nb = $stmt->rowCount();



    if($nb==0){
        include('resultat-recherche4.php');
    }else{
        include('resultat-recherche2.php');
    }
?>
