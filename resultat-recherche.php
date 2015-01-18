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
    $j=0;
    if(isset($_POST['equipement'])){
        $sql .= " INNER JOIN equipe ON logements.id = equipe.logements_id";
    $j++;
    }if(isset($_POST['contrainte'])){
        $sql .= " INNER JOIN contraint ON logements.id = contraint.logements_id";
    $j++;
    }
    foreach($_POST as $k => $v){
        if(!is_array($v)){
            if (!empty($v)){
                if($i==0){
                    $sql .= " WHERE";
                }else{
                    $sql .= " AND";
                }
                $sql .= " $k = $v";
                $i++;
            }
        }else{
            if($j>0){
                foreach ($v as $m => $w){
                    if($i==0){
                        $sql .= " WHERE";
                    }else{
                        $sql .= " AND";
                    }
                    $sql .= " $m = $w";
                    $i++;
                }
            }

        }  
    }

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











































?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="style.css" rel="stylesheet" />
        <script language="javascript">
            function confirme( identifiantLogement ){
                var confirmation = confirm( "Voulez vous vraiment supprimer cette annonce ?" ) ;
                if( confirmation ){
                    document.location.href = "confirmSuppr.php?idlog="+identifiantLogement ;
                }
            }
        </script>
    </head>

    <body>

        <div id="wrapper">

            <?php include("header.php"); ?>

            <div id="logements">
            <?php 
            	$i = 0;
            	while ($i < $nb){
            ?>
            <div id="three-column" class="container">

                <?php if($i < $nb) {?><div class="tbox1">
                
                    <div class="box-style box-style01">
                        <?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>
                        
                        <div class="content">
                
                            <div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" alt="" /></div>
                                
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $stmt-> fetch();?>
                            </div>
            
                        </div>
                    
                    </div><?php } ?><?php $i++ ?>
        
                <?php if($i < $nb) {?><div class="tbox2">
            
                    <div class="box-style box-style02">
                        <?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>
                        
                        <div class="content">

                            <div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" alt="" /></div>
                
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $stmt-> fetch();?>
                            </div>
            
                        </div>
                        
                    </div><?php } ?><?php $i++ ?>
        
                <?php if($i < $nb) {?><div class="tbox3">
            
                    <div class="box-style box-style03">
                        <?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>
                        
                        <div class="content">

                            <div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" alt="" /></div>
                    
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $stmt-> fetch();?>
                            </div>
            
                        </div>
        
                    </div>
                
                </div><?php } ?><?php $i++ ?>
                <?php } ?>
    
            <!--<div id="three-column" class="container">
        
                <div class="tbox1">
            
                    <div class="box-style box-style01">
                
                        <div class="content">
                            <?php $ligne = $stmt-> fetch();?>
                            <div class="image"><img src="images/maison1.jpg" width="324" height="200" alt="" /></div>
                
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                
                            </div>
            
                        </div>
        
                    </div>
        
                <div class="tbox2">
            
                    <div class="box-style box-style02">
            
                        <div class="content">
                    
                            <div class="image"><img src="images/maison1.jpg" width="324" height="200" alt="" /></div>
                                <?php $ligne = $stmt-> fetch();?>
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>

                            </div>
            
                        </div>
        
                    </div>
        
                <div class="tbox3">
            
                    <div class="box-style box-style03">
                
                        <div class="content">
                                <?php $ligne = $stmt-> fetch();?>
                            <div class="image"><img src="images/maison1.jpg" width="324" height="200" alt="" /></div>
                    
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>

                            </div>
            
                        </div>
        
                    </div>

                </div>
-->
            </div>
        </div>

        </div>

        <?php include("footer.php"); ?>

    </body>

</html>