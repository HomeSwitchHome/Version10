<?php require_once("config.php");
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
			
		<div id="user_list">
			<h3>Votre mot de passe a été modifié.</h3>
			<h2><a href="login.php">Connexion</a></h2>
		</div>
			



		</div>
		<?php include("footer.php") ?>
	</body>
</html>