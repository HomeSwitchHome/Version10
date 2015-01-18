<?php require_once("config.php");
require 'functions.php';
$mail=$_GET['mail'];
$clefCompte=$_GET['clefCompte'];

$user_name = $bdd -> prepare("SELECT clefCompte, email FROM membres WHERE email ='$mail'");
$user_name -> execute();
$user = $user_name->fetch();


?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Home Switch Home</title>
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
		<div id="wrapper">
				
			<?php include("header.php") ?>
			<br/><br/><br/><br/>
			
			<?php if ($user['clefCompte'] == $clefCompte) { 
				echo("<p>Votre compte a bien été activé.</p>
			<div align=\"center\"><h2><a href=\"login.php\">Connexion</a></h2></div>");
				$compteactive = $bdd -> prepare("UPDATE membres SET compteActif='1' WHERE email ='$mail'");
				$compteactive -> execute();
			}
			else {echo("<p>Votre compte n'a pas été activé.</p><div align=\"center\"><h2><a href=\"index.php\">Retourner à la page d'accueil/a></h2></div>");}
				?>

			



		</div>
		<?php include("footer.php") ?>
	</body>
</html>