<?php
	require_once("config.php"); 
	$q=$_GET['q'];

    $s=explode(" ", $q);
    $sql="SELECT * FROM logements";
    $ii=0;
    foreach ($s as $mot) {
        if(strlen($mot)>3) {
            if ($ii==0) {
                $sql.=" WHERE ";
            }
            else {
                $sql.=" OR ";
            }
            $sql.="titre_annonce LIKE '%$mot%' OR descriptionSuccincte LIKE '%$mot%' OR description LIKE '%$mot%'";
            $ii++;
        }
    }
    $req = $bdd -> prepare($sql);
    $req ->execute();

	$ligne = $req-> fetch();
    $nb = $req->rowCount();

<<<<<<< HEAD

=======
    
>>>>>>> 9807f8f4c006391615acfad66a6328bf6a64c64e
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
                                            <?php $ligne = $req-> fetch();?>
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
                                            <?php $ligne = $req-> fetch();?>
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
                                            <?php $ligne = $req-> fetch();?>
                            </div>
            
                        </div>
        
                    </div>
                
                </div><?php } ?><?php $i++ ?>
                <?php } ?>
    
           
            </div>
        </div>

        </div>

        <?php include("footer.php"); ?>

    </body>

</html>