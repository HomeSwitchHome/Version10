<?php require_once("config.php"); 
$id  = $_GET["idPersonne"];

 ?>


<html>
    <head>
        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" />
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
						$envoidelete = $bdd -> prepare("DELETE FROM membres WHERE id = '$id' ");
						$envoidelete -> execute();
					}
				?>

				<a href="modif1.php">Retour page administration</a>
			</div>
		</div>
	</body>
</html>