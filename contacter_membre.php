<?php require_once("config.php");
require_once('PHPMailer/class.phpmailer.php');
$idLogement = $_GET['idLogement'];

$user_name = $bdd -> prepare('SELECT prenom, nom, email, age, telephone FROM membres WHERE id = '.$_SESSION['userID']);
$user_name -> execute();

$proprietaire = $bdd -> prepare('SELECT logements.id,logements.membres_idMembres, membres.email FROM logements INNER JOIN membres ON logements.membres_idMembres=membres.id WHERE logements.id='.$idLogement);
$proprietaire -> execute();

$result = $user_name -> fetch();
$infoproprio = $proprietaire -> fetch();

if (isverified()) {
	$email=$result['email'];
	$prenom=$result['prenom'];
	$nom=$result['nom'];
	$age=$result['age'];
	$telephone=$result['telephone'];
	
	$sendto=$infoproprio['email'];
	
	$pageweb=$_SERVER['SERVER_NAME'];

		$mail = new PHPMailer();
	
		$mail->IsHTML(true);
		$mail->CharSet = "utf-8";
		$mail->From = $email;
		$mail->FromName = $prenom.' '.$nom;
		$mail->Subject = $prenom.' '.$nom.' est intéressé par votre annonce';
		$mail->Body = 
					'Bonjour, <br/>
	
					Nous vous informons que '.$prenom.' '.$nom.' est intéressé(e) par votre <a href="'.$pageweb.'/Version10/page-logement.php?idLogement='.$idLogement.'">annonce</a>
					Voici ses coordonnées : '.$email.' '.$telephone.'
					<br/>Veuillez le contacter.';
		$mail->AddAddress($sendto);
		
	    $mail->Send();
	}
	



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
			<p>Le propriétaire de l'annonce sait désormais que vous êtes intéressé par cette annonce, il prendra contact avec vous afin d'établir les termes d'un échange.</p>
			<div align="center"><h2><a href="index.php">Retourner à la page d'accueil</a></h2></div>



		</div>
		<?php include("footer.php") ?>
	</body>
</html>