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