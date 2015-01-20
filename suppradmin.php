<?php
require_once("config.php"); 
$id  = $_GET["idPersonne"];
?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="style.css" rel="stylesheet" />
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
				    	if ($_SESSION['userID']==$id) {echo("<div align='center'><h2>Vous ne pouvez pas vous supprimer</h2></div>");}
						else {$envoimodif = $bdd -> prepare("UPDATE membres SET admin = '0' WHERE id = '$id' ");
						$envoimodif -> execute();}
					}
				 
				?>
				<a href="addadmin.php">Retour gestion administrateurs</a><br/>
				<a href="modif1.php">Retour gestion utilisateurs</a>
			</div>
		</div>
	</body>
</html>