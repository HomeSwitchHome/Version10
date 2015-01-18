<?php
	require_once("config.php"); 
    require("functions.php");
    debug($_GET['q']);
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
            $sql.="titre_annonce, descriptionSuccincte, description LIKE '%$mot%'";
            $ii+;
        }
    }

	$ligne = $sql-> fetch();
    

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
                    $nb = $data['nb'];?>
            <?php 
            	while (!empty($ligne)){
            ?>
            <div id="three-column" class="container">

                <?php if(!empty($ligne) {?><div class="tbox1">
                
                    <div class="box-style box-style01">
                        <?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>
                        
                        <div class="content">
                
                            <div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" alt="" /></div>
                                
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
                            </div>
            
                        </div>
                    
                    </div><?php } ?>
        
                <?php if(!empty($ligne) {?><div class="tbox2">
            
                    <div class="box-style box-style02">
                        <?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>
                        
                        <div class="content">

                            <div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" alt="" /></div>
                
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
                            </div>
            
                        </div>
                        
                    </div><?php } ?>
        
                <?php if(!empty($ligne) {?><div class="tbox3">
            
                    <div class="box-style box-style03">
                        <?php if (isadmin()) { ?>
                        <a href="" onClick="confirme(<?php echo($ligne['id']);?>)"><img src="cross.svg" width="15px" height="15px" class="boutonsuppr"></a><?php } ?>
                        
                        <div class="content">

                            <div class="image"><img src="img/<?php echo($ligne['id']);?>/1.jpg" width="324" height="200" alt="" /></div>
                    
                                <h2><?php echo ($ligne['titre_annonce']);?></h2>
                                <p><?php echo ($ligne['descriptionSuccincte']);?></p>
                                <a href="page-logement.php?idLogement=<?php echo($ligne['id']);?>" class="button">Plus d'informations</a>
                                            <?php $ligne = $q-> fetch();?>
                            </div>
            
                        </div>
        
                    </div>
                
                </div><?php } ?>
                <?php } ?>
    
            
            </div>
        </div>

        </div>

        <?php include("footer.php"); ?>

    </body>

</html>