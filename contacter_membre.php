<?php require_once("config.php");
require_once('PHPMailer/class.phpmailer.php');
$idUser = $_GET['idUser'];

$user_name = $bdd -> prepare('SELECT prenom, nom, email, age, telephone FROM membres WHERE id = '.$idUser);
$user_name -> execute();

$result = $user_name -> fetch();





	$mail = new PHPMailer();

	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";
	$mail->From = $email;
	$mail->FromName = 'Contact';
	$mail->Subject = 'Un formulaire de contact a été soumis';
	$mail->Body = $message_html;
	$mail->AddAddress('danny.canaan@gmail.com');
	
    $mail->Send();



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

			<h4>Le propriétaire de l'annonce sait désormais que vous êtes intéressé par cette annonce, il prendra contact avec vous afin d'établir les termes d'un échange.</h4>
			<a href="index.php">Retourner à la page d'accueil</a>



		</div>
		<?php include("footer.php") ?>
	</body>
</html>