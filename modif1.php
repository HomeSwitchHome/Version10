<?php require_once("config.php"); 
$user_name = $bdd -> prepare('SELECT nom, id FROM membres ORDER BY id ASC');
$user_name -> execute();
 ?>


<html>

    <head>

        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" />
  		<script language="javascript">
			function confirme( identifiant ){
				var confirmation = confirm( "Voulez vous vraiment supprimer cet utilisateur ?" ) ;
				if( confirmation ){
					document.location.href = "suppression2.php?idPersonne="+identifiant ;
				}
			}
    	</script>
    </head>
	<body>
		<?php include("header.php"); ?>
	    <div id="wrapper">
	        <div id="user_list">
		            
		    	<?php	    
				//echo $req['nom'];
				//exécution de la requête:


				//affichage des données:
				/* while( !empty($req) ){
					echo(
						"<div align=\"center\">"
						.$req['nom']." ".$req['id']
						." <a href=\"modification2.php?idPersonne=".$req['id']."\">modifier</a></div>\n"
					) ;
				}*/


				//$result = $user_name->fetchAll();
				//print_r($result);
		    
		    
			    $verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
			    $verifadmin -> execute();
			    $numadmin = $verifadmin->fetch();
			    if ($numadmin['admin'] == 1){
			    	echo ("<div align=\"center\"><a href=\"addadmin.php\">Gestion des administrateurs</a></div>");

			    	echo ("<h2>Liste des utilisateurs</h2>");
			    	while ($u = $user_name->fetch()){
					    //echo($u['nom']);
					    //echo '<br/>';

					    echo ("<div align=\"center\">"
					           .$u['nom']." ".$u['id']
					           ." <a href=\"modif2.php?idPersonne=".$u['id']."\">Modifier</a>  <a href=\"#\" onClick=\"confirme('".$u['id']."')\" >Supprimer</a>\n</div>"
					    );
					}
				}else {
					echo ("<div align=\"center\">Vous n'avez pas accès à cette page, <a href=\"index.php\">retour à la page d'accueil</a></div>");
				}
			    

			    /*$verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
			    $verifadmin -> execute();
			    $numadmin = $verifadmin->fetch();
			    if ($numadmin['admin'] == 1) {echo ("admin");}
			    else {echo ("non admin");}*/



			    /*if($numadmin == "1") {
			      echo 'admin';
			    }
			    else {
			      echo 'non admin';
			    }*/
			    ?>
			</div>
		</div>
		<?php include("footer.php");?>
	</body>
</html>