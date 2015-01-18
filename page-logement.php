<?php require_once("config.php"); 
require 'functions.php';
$idLogement  = $_GET["idLogement"] ;
//$idLogement = 4;
$logement_info = $bdd -> prepare('SELECT nombrePieces, description, titre_annonce, surfaceInterieure, surfaceExterieure, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes
                                    FROM logements WHERE id = '.$idLogement);
$logement_info -> execute();

$logement_contrainte = $bdd -> prepare('SELECT contraint.logements_id, contraint.contraintes_id, contraintes.contrainte, contraintes.id FROM contraint INNER JOIN contraintes ON contraint.contraintes_id=contraintes.id WHERE contraint.logements_id='.$idLogement);
$logement_contrainte -> execute();

$logement_equipe = $bdd -> prepare('SELECT equipe.logements_id, equipe.equipements_id, equipements.equipement, equipements.id FROM equipe INNER JOIN equipements ON equipe.equipements_id=equipements.id WHERE equipe.logements_id='.$idLogement);
$logement_equipe -> execute();

$result = $logement_info -> fetch();
$membrelog=$result['membres_idMembres'];

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Home Switch Home</title>
        <link href="style.css" rel="stylesheet" />       
        <script language="javascript">
			function confirme( identifiant ){
				var confirmation = confirm( "Voulez-vous vraiment supprimer votre annonce ?" ) ;
				if( confirmation ){
					document.location.href = "suppression_annonce.php?idLogement="+identifiant ;
				}
			}
			function confirme2( identifiant ){
				var confirmation = confirm( "Voulez-vous vraiment contacter le propriétaire de cette annonce ?" ) ;
				if( confirmation ){
					document.location.href = "contacter_membre.php?idLogement="+identifiant ;
				}
			}
    	</script>
    </head>

    <body>
        <?php include("header.php"); ?>

        <div id="wrapper">
                <div id="photo-logement">
                    <img src="img/<?php echo($idLogement);?>/1.jpg" class="home-image">
                    <h1 id="titreannonce"><?php echo $result['titre_annonce'];?></h1>
                    <p id="descriptifannonce"><?php echo $result['description'];?></p>
                    <a href="#ancre"><img src="fleche2.png" class="arrowdown"></a>
                </div>
        </div>

        <a id="ancre"></a>
        <div id="wrapper3">
            <div class="annonce">
	            <div class="profil">
	                <div class="colonne_gauche_profil">
	                	<?php if ($membrelog == $_SESSION['userID'] || isadmin()) {
	                	echo ("<div align=\"center\">
	                		<a href=\"#\" onClick=\"confirme2(".$idLogement.")\">Je suis intéressé par cette annonce !</a>
	                		<br/>
	                		<a href=\"modifier-annonce.php?idLogement=".$idLogement."\">Modifier mon annonce</a>
	                		<br/>
	                		<a href=\"#\" onClick=\"confirme(".$idLogement.")\">Supprimer mon annonce</a>
	                		<br/>
	                	</div>");
	                	}
	                	if (isverified()) {
	                		echo ("<div align=\"center\">
	                		<a href=\"#\" onClick=\"confirme2(".$idLogement.")\">Je suis intéressé par cette annonce !</a>
	                		<br/>
	                		
	                	</div>");
	                	}
	                	else {
	                		echo ("<div align=\"center\">
	                		<p>Votre compte n'est pas activé</p>
	                		<br/>
	                		
	                	</div>");

	                	}

	                	?>
	                    <div class="liste_logements">
	                    	<?php //affichage de l'entête du tableau
	 
	                        //nom du répertoire contenant les images à afficher
	                        $nom_repertoire = 'img/'.$idLogement;
	                         
	                        //on ouvre le repertoire
	                        if(file_exists($nom_repertoire)){
		                        $pointeur = opendir($nom_repertoire);
		                        $i = 0;
		                         
		                        //on les stocke les noms des fichiers des images trouvées, dans un tableau
		                        while ($fichier = readdir($pointeur)){
			                        if (substr($fichier, -3) == "gif" || substr($fichier, -3) == "jpg" || substr($fichier, -3) == "png"
			                        || substr($fichier, -4) == "jpeg" || substr($fichier, -3) == "PNG" || substr($fichier, -3) == "GIF"
			                        || substr($fichier, -3) == "JPG"){
				                        $tab_image[$i] = $fichier;
				                        $i++;
				                    }
		                        }
		                         
		                        //on ferme le répertoire
		                        closedir($pointeur);
		                        //on trie le tableau par ordre alphabétique
		                        array_multisort($tab_image, SORT_ASC);
	                         
		                        //affichage des images (en 60 * 60 ici)
		                        for ($j=0;$j<=$i-1;$j++){
			                        $image = '<a href="'.$nom_repertoire.'/'.$tab_image[$j].'"><img src="'.$nom_repertoire.'/'.$tab_image[$j].'" id="image_liste_logements"></a>';
			                        echo ($image);
		                        }
	                    	}
	                    	?>
	                    </div>
	                </div>
	                <div class="colonne_droite_profil">
	                    <div id="infosPersoTitre">
	        
	                        <h1><strong>A propos du logement</strong></h1>

	                            <ul class="infosPerso">
	                        
	                                <li><?php echo $result['description'];?></li>

	                            </ul>
	        
	                        <h1><strong>Le logement</strong></h1>

	                            <ul class="infosPerso">
	                        
	                                <li>Type : <?php echo $result['types_idTypes'];?></li>
	                                <li>Superficie : <?php echo $result['surfaceInterieure'];?> m2 en intérieur, <?php echo $result['surfaceExterieure'];?> m2 en exterieur</li>
	                                <li>Chambres : <?php echo $result['nombreLitsDoubles'];?> lit(s) double(s), <?php echo $result['nombreLitsSimples'];?> lit(s) simple(s)</li>

	                            </ul>
	            
	                         <h1><strong>Équipements</strong></h1>

	                            <ul class="infosPerso">
	                        
	                                <?php while ($equipement = $logement_equipe -> fetch()) 
	                        		{
	                        			echo("<img src='pictos/".$equipement['equipement'].".png' class=\"picto\" title='' >");
	                            	}
	                                ?>
	                             </ul>

	                        <h1><strong>Description</strong></h1>

	                            <ul class="infosPerso">
	                        
	                                <li>A proximité : <?php echo $result['descriptionProximite'];?></li>
	 
	                             </ul>

	                        <h1><strong>Contraintes et services</strong></h1>

	                            <ul class="infosPerso">
	                        		<?php while ($contrainte = $logement_contrainte -> fetch()) 
	                        		{
	                        			echo("<img src='pictos/".$contrainte['contrainte'].".png' class=\"picto\">");
	                            	}
	                                ?>
	                                
	 							</ul>
	                        <h1><strong>Commentaires</strong></h1>     
	                            <ul class="infosPerso">
	                                <?php include("Essavis.php"); ?>
	                            </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>

        <?php include("footer.php"); ?>        
        <a id="commentaires"></a>
    </body>
</html>