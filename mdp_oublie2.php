<?php require_once("config.php");
require_once('PHPMailer/class.phpmailer.php');
$email=$_POST['email'];

$user_mail = $bdd -> prepare("SELECT email, clefCompte FROM membres WHERE email = '$email'");
$user_mail -> execute();
$user= $user_mail -> fetch();
$clefCompte=$user['clefCompte'];
if (isset($user['email'])&&!empty($user['email'])) {

	$mail = new PHPMailer();

				$mail->IsHTML(true);
				$mail->CharSet = "utf-8";
				$mail->From = 'contact@hsh.com';
				$mail->FromName = 'Home Switch Home';
				$mail->Subject = 'Votre mot de passe sur Home Switch Home';
				$mail->Body = 
				'Bonjour , <br/>
				Vous venez de faire une demande de mot de passe oublié sur Home Switch Home. Afin de réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant :
				<a href="http://localhost:8888/Version10/reset-mdp.php?mail='.$email.'&clefCompte='.$clefCompte.'">réinitialiser votre mot de passe</a>
				';
				$mail->AddAddress($email);
	
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
			<?php include("header.php"); ?>
			<div id="user_list">
			<h3>Veuillez cliquer sur le lien recu par mail.</h3>
			</div>
		<div id="footer">
		    <?php include("footer.php"); ?>
		</div>

	</body>
</html>