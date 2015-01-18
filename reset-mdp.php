<?php require_once("config.php");
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

			echo('<form method="post" class="register" action="new-mdp.php">
				<input type="hidden" id="email" name="email" value="'.$mail.'"> 
				<label for="mdp">Nouveau mot de passe</label>
				<input type="password" id="mdp" name="mdp">
				<input type="submit" class="submit_button" value="Envoyer">
			</form>');	
			}
			else {echo("<p>Votre compte n'a pas été reconnu.</p><div align=\"center\"><h2><a href=\"index.php\">Retourner à la page d'accueil/a></h2></div>");}
				?>

			



		</div>
		<?php include("footer.php") ?>
	</body>
</html>