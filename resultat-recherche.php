<?php
	require_once("config.php");

    debug($_POST);

    // // $sql = "SELECT * FROM logements WHERE nombreLitsDoubles + nombreLitsSimples = :capaciteTotale AND nombreLitsDoubles = :nombreLitsDoubles AND nombreLitsSimples = :nombreLitsSimples AND surfaceInterieure + surfaceExterieure = :surfaceTotale AND surfaceInterieure = :surfaceInterieure AND surfaceExterieure = :surfaceExterieure AND nombrePieces = :nombrePieces AND types_idTypes = :type ANDDER BY id desc";
    // // $sql2 = "SELECT count(id) AS nb FROM logements WHERE nombreLitsDoubles + nombreLitsSimples = :capaciteTotale AND nombreLitsDoubles = :nombreLitsDoubles AND nombreLitsSimples = :nombreLitsSimples AND surfaceInterieure + surfaceExterieure = :surfaceTotale AND surfaceInterieure = :surfaceInterieure AND surfaceExterieure = :surfaceExterieure AND nombrePieces = :nombrePieces AND types_idTypes = :type ANDDER BY id desc";
    // $sql = "SELECT * FROM logements INNER JOIN equipe ON logements.id = equipe.logements_id INNER JOIN contraint ON logements.id = contraint.logements_id WHERE equipements_id = :garage AND equipements_id = :jardin AND equipements_id = :piscine AND equipements_id = :television AND equipements_id = :train AND equipements_id = :handicap AND equipements_id = :wifi AND equipements_id = :cuisine AND equipements_id = :aeroport AND contraintes_id = :animauxAutorises AND contraintes_id = :animauxInterdits AND contraintes_id = :bruitAutorise AND contraintes_id = :bruitInterdit AND contraintes_id = :fumeAutorise AND contraintes_id = :fumeInterdite AND contraintes_id = :plantes AND nombreLitsDoubles + nombreLitsSimples = :capaciteTotale AND nombreLitsDoubles = :nombreLitsDoubles AND nombreLitsSimples = :nombreLitsSimples AND surfaceInterieure + surfaceExterieure = :surfaceTotale AND surfaceInterieure = :surfaceInterieure AND surfaceExterieure = :surfaceExterieure AND nombrePieces = :nombrePieces AND types_idTypes = :type ORDER BY logements.id desc";
    // $sql2 = "SELECT count(logements.id) AS nb FROM logements INNER JOIN equipe ON logements.id = equipe.logements_id INNER JOIN contraint ON logements.id = contraint.logements_id WHERE equipements_id = :garage AND equipements_id = :jardin AND equipements_id = :piscine AND equipements_id = :television AND equipements_id = :train AND equipements_id = :handicap AND equipements_id = :wifi AND equipements_id = :cuisine AND equipements_id = :aeroport";



    // try{
    //     $stmt = $bdd->prepare($sql);
    //     $stmt2 = $bdd->prepare($sql2);

    //     // $stmt->execute(['nombrePieces' => $_POST['nombrePieces'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'surfaceTotale' => $_POST['surfaceInterieure'] + $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'capaciteTotale' => $_POST['nombreLitsSimples'] + $_POST['nombreLitsDoubles'], 'type' => $_POST['type']]);
    //     // $stmt2->execute(['nombrePieces' => $_POST['nombrePieces'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'surfaceTotale' => $_POST['surfaceInterieure'] + $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'capaciteTotale' => $_POST['nombreLitsSimples'] + $_POST['nombreLitsDoubles'], 'type' => $_POST['type']]);
    //     $stmt->execute(['garage' => $_POST['equipement']['garage'], 'jardin' => $_POST['equipement']['jardin'], 'piscine' => $_POST['equipement']['piscine'], 'television' => $_POST['equipement']['television'], 'train' => $_POST['equipement']['train'], 'handicap' => $_POST['equipement']['handicap'], 'wifi' => $_POST['equipement']['wifi'], 'cuisine' => $_POST['equipement']['cuisine'], 'aeroport' => $_POST['equipement']['aeroport'], 'animauxAutorises' => $_POST['contrainte']['animauxAutorises'], 'animauxInterdits' => $_POST['contrainte']['animauxInterdits'], 'bruitAutorise' => $_POST['contrainte']['bruitAutorise'], 'bruitInterdit' => $_POST['contrainte']['bruitInterdit'], 'fumeAutorise' => $_POST['contrainte']['fumeAutorise'], 'fumeInterdite' => $_POST['contrainte']['fumeInterdite'], 'plantes' => $_POST['contrainte']['plantes'], 'nombrePieces' => $_POST['nombrePieces'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'surfaceTotale' => $_POST['surfaceInterieure'] + $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'capaciteTotale' => $_POST['nombreLitsSimples'] + $_POST['nombreLitsDoubles'], 'type' => $_POST['type']]);
    //     $stmt2->execute(['garage' => $_POST['equipement']['garage'], 'jardin' => $_POST['equipement']['jardin'], 'piscine' => $_POST['equipement']['piscine'], 'television' => $_POST['equipement']['television'], 'train' => $_POST['equipement']['train'], 'handicap' => $_POST['equipement']['handicap'], 'wifi' => $_POST['equipement']['wifi'], 'cuisine' => $_POST['equipement']['cuisine'], 'aeroport' => $_POST['equipement']['aeroport']]);

    //     $ligne = $stmt-> fetch();
    // 	$nb = $stmt2-> fetch();
    // }catch (PDOException $e) {
    //     echo $e->getMessage();
    // }

    // //   AND contraintes_id = :animauxAutorises AND contraintes_id = :animauxInterdits AND contraintes_id = :bruitAutorise AND contraintes_id = :bruitInterdit AND contraintes_id = :fumeAutorise AND contraintes_id = :fumeInterdite AND contraintes_id = :plantes AND nombreLitsDoubles + nombreLitsSimples = :capaciteTotale AND nombreLitsDoubles = :nombreLitsDoubles AND nombreLitsSimples = :nombreLitsSimples AND surfaceInterieure + surfaceExterieure = :surfaceTotale AND surfaceInterieure = :surfaceInterieure AND surfaceExterieure = :surfaceExterieure AND nombrePieces = :nombrePieces AND types_idTypes = :type 
    // // , 'animauxAutorises' => $_POST['contrainte']['animauxAutorises'], 'animauxInterdits' => $_POST['contrainte']['animauxInterdits'], 'bruitAutorise' => $_POST['contrainte']['bruitAutorise'], 'bruitInterdit' => $_POST['contrainte']['bruitInterdit'], 'fumeAutorise' => $_POST['contrainte']['fumeAutorise'], 'fumeInterdite' => $_POST['contrainte']['fumeInterdite'], 'plantes' => $_POST['contrainte']['plantes'], 'nombrePieces' => $_POST['nombrePieces'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'surfaceTotale' => $_POST['surfaceInterieure'] + $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'capaciteTotale' => $_POST['nombreLitsSimples'] + $_POST['nombreLitsDoubles'], 'type' => $_POST['type']
    // $nb = $nb['nb'];
    // debug($stmt);
    // debug($ligne);
    // debug($nb);





    $sql = "SELECT * FROM logements";

    $i=0;
    // $j=0;
    // if(isset($_POST['equipement'])){
    //     $sql .= " INNER JOIN equipe ON logements.id = equipe.logements_id";
    // $j++;
    // }if(isset($_POST['contrainte'])){
    //     $sql .= " INNER JOIN contraint ON logements.id = contraint.logements_id";
    // $j++;
    // }
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
        }elseif($k=='surfaceTotale' || $k=='capaciteTotale'){
            
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
        }
        // else{
        //     if($j>0){
        //         foreach ($v as $m => $w){
        //             if($i==0){
        //                 $sql .= " WHERE";
        //             }else{
        //                 $sql .= " AND";
        //             }
        //             $sql .= " $m = $w";
        //             $i++;
        //         }
        //     }

        // }  
    }

    $sql .= " ORDER BY nombreClick desc";

    debug($sql);

    try{
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

    }catch (PDOException $e) {
        echo $e->getMessage();
    }

    $ligne = $stmt-> fetch();
    $nb = $stmt->rowCount();

    debug($nb);
    debug($ligne);

    if($nb==0){
        include('resultat-recherche4.php');
    }else{
        include('resultat-recherche2.php');
    }
?>
