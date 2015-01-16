<?php require_once("config.php"); 
$admin_name = $bdd -> prepare('SELECT nom, id, admin FROM membres WHERE admin = "1" ORDER BY id ASC');
$admin_name -> execute();
 ?>


<html>

    <head>

        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" />
  		<script language="javascript">

        	function confirme( identifiant ){
				var confirmation = confirm( "Voulez vous vraiment supprimer cet administrateur ?" ) ;
		  		if( confirmation ){
		    		document.location.href = "suppradmin.php?idPersonne="+identifiant ;
		   		}
		    }
    	</script>
    </head>
	<body>
		<?php include("header.php"); ?>
		<div id="wrapper">
			<div id="user_list">
			            
			<?php
			      
			    $verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
			    $verifadmin -> execute();
			    $numadmin = $verifadmin->fetch();
			    if ($numadmin['admin'] == 1) {
			    	echo ("<div align=\"center\"><a href=\"modif1.php\">Gestion des utilisateurs</a></div>");

			    	echo ("<h2>Liste des administrateurs</h2>");
					while ($a = $admin_name->fetch()){
				    //echo($u['nom']);
				    //echo '<br/>';

						echo ("<div align=\"center\">"."<a href=\"#\" onClick=\"confirme('".$a['id']."')\" ><img src=\"cross.svg\" width=\"10px\" height=\"10px\"> </a>"
				           	.$a['nom']." ".$a['id']
				            ."</div>"
				        );
					}
					echo ("<div align=\"center\"><form name=\"insertion\" action=\"addadmin2.php\" method=\"POST\"><p>Ajouter un administrateur :</p><input type=\"text\" name=\"idNewAdmin\" placeholder=\"Rentrer numéro id\"><input type=\"submit\" value=\"Ajouter\"></form></div>");
				}else{
					echo ("<div align=\"center\">Vous n'avez pas accès à cette page, <a href=\"index.php\">retour à la page d'accueil</a></div>");
				} 
			?>

			</div>
		</div>
		<?php include("footer.php");?>
	</body>
</html>