<?php require_once("config.php");
require 'functions.php';
$mdp=sha1($_POST['mdp']);
$mail=$_POST['email'];

$user_mdp = $bdd -> prepare("UPDATE membres SET mdp='$mdp' WHERE email ='$mail'");
$user_mdp -> execute();


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
			
			<h2>Votre mot de passe a été modifié.</h2>

			



		</div>
		<?php include("footer.php") ?>
	</body>
</html>