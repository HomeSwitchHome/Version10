<?php require_once("config.php");
require_once('PHPMailer/class.phpmailer.php');


//Création des variables, ce qui va permettre de les récupèrer dans le HTML.
$messages= [];
 
$prenom = null;
$nom = null;
$email = null;
$mdp = null;
$check_mdp = null;
$age = null;
$telephone = null;
 
//Empty vérifie si la variable existe 	mais elle doit être vide, ! devant un booléen l'inverse.
if(!empty($_POST))
	{
  	//Isset vérifie qu'une ou plusieurs variables existe et ne sont pas null/false. 
    if(isset($_POST["prenom"], $_POST["nom"], $_POST["email"], $_POST["mdp"], $_POST["check_mdp"], $_POST["age"], $_POST["telephone"]))
    	{
     	//Récupération des valeurs, ça permet de mettre à jour les variables par défaut et réafficher le formulaire avec les bonnes valeurs, attention à TOUJOURS filtrer ce qui vient d'un utilisateur pour éviter des failles.
    	$prenom = $_POST['prenom'];
    	$nom = $_POST['nom'];
    	$email = $_POST['email'];
	    $mdp = $_POST['mdp'];
	    $check_mdp = $_POST['check_mdp'];
	    $age = $_POST["age"];
 		$telephone = $_POST["telephone"];
 		$clefCompte = bin2hex(openssl_random_pseudo_bytes(10));
    	//Test des variables.
  		//Si pas alphanumérique ou si vide : erreur.
    	if(!ctype_alnum($prenom) || mb_strlen($prenom) < 1)
    	    $messages[] = "Erreur prénom (caractères alphanumériques) ou champ vide.";
              
    	if(!ctype_alnum($nom) || mb_strlen($nom) < 1)
    	    $messages[] = "Erreur nom (caractères alphanumériques) ou champ vide.";

    	if(!ctype_digit($age) || mb_strlen($age) < 1)
    	    $messages[] = "Erreur age (caractères numériques) ou champ vide.";

    	if(!ctype_digit($telephone) || mb_strlen($telephone) < 10)
    	    $telephone[] = "Erreur telephone (caractères numériques) ou champ vide.";


		//Force un format email. 
    	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    	    $messages[] = "Erreur email (mauvais format).";
 		
 		//Force un minimum de 8 caractères.
    	if(mb_strlen($mdp) < 8)
    	    $messages[] = "Erreur mot de passe (8 caractères minimum).";

    	if(mb_strlen($check_mdp) < 8)
    	    $messages[] = "Erreur vérification du mot de passe (8 caractères minimum).";

    	//Vérifie que les deux mots de passe concordent.
    	if($mdp != $check_mdp)
    		$messages[] = "Les deux mots de passe sont différents.";
 
    	//Check fini, si l'array $message est vide, aucun problème, sinon j'en ai une ou plusieurs.
    	if(count($messages) === 0)
    		{
    	    $mdp = sha1($mdp);//on crypte le mdp rentré par sha1 afin de le rentrer en BDD
    
			try
                {
                $register = $bdd->prepare("INSERT INTO membres (prenom, nom, email, mdp, age, telephone, clefCompte) VALUES (:prenom, :nom, :email, :mdp, :age, :telephone, :clefCompte)");

                $register->execute([
                    ":prenom" => $prenom,
                    ":nom" => $nom,
                    ":email" => $email,
                    ":mdp" => $mdp,
                    ":age" => $age,
                    ":telephone" => $telephone,
                    ":clefCompte" => $clefCompte
                    ]);
 
                $messages = 'Inscription réussie !';
                $mail = new PHPMailer();

				$mail->IsHTML(true);
				$mail->CharSet = "utf-8";
				$mail->From = 'contact@hsh.com';
				$mail->FromName = 'Home Switch Home';
				$mail->Subject = 'Bienvenue sur Home Switch Home';
				$mail->Body = 
				'Bonjour '.$prenom.' '.$nom.', <br/>
				Vous venez de créer un compte sur Home Switch Home. Afin de valider votre inscription, veuillez cliquer sur le lien suivant :
				<a href="http://localhost:8888/Version10/validation.php?mail='.$email.'&clefCompte='.$clefCompte.'">valider mon adresse mail</a>
				';
				$mail->AddAddress($email);
	
    			$mail->Send();
                }    	

    		catch(Exception $e)
    			{
        		if($e->getCode() == 23000)
        			$messages = 'Ces identifiants existent déjà.';
        	
        		else
		        	{
        	    	$messages = 'Nous sommes incapables de procéder à votre demande. Veuillez réessayer plus tard.';
        			}
   				}
			}
		}
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
			<br/><br/><br/>
			<h3 id="register-title">INFORMATIONS PERSONNELLES</h3>
			
			<form method="post" id="register">

				<div id="register-left-grid">
					<div>
						<label for="prenom">Prénom *</label>
						<input type="text" id="prenom" name="prenom" value="<?= escape($prenom); ?>"> 
					</div>

					<div>
						<label for="nom">Nom *</label>
						<input type="text" id="nom" name="nom" value="<?= escape($nom); ?>"> 
					</div>

					<div>
						<label for="age">Age *</label>
						<input type="text" id="age" name="age" value="<?= escape($age); ?>"> 
					</div>

					<div>
						<label for="telephone">Télephone *</label>
						<input type="text" id="telephone" name="telephone" value="<?= escape($telephone); ?>"> 
					</div>

					<div>
						<label for="email">Email *</label>
						<input type="text" id="email" name="email" value="<?= escape($email); ?>"> 
					</div>
				</div>

				<div id="register-right-grid">
					<div>
						<label for="mdp">Mot de passe *</label>
						<input type="password" id="mdp" name="mdp" value="<?= escape($mdp); ?>">
					</div>	

					<div>
						<label for="check_mdp">Confirmez votre mot de passe *</label>
						<input type="password" id="check_mdp" name="check_mdp" value="<?= escape($check_mdp); ?>">
					</div>
				</div>

				<input type="submit" id="submit_button" value="Envoyer">
			</form>	

			<div id="register_errors">
				<?php showErrors($messages) ?>
			</div>

		</div>
		
		<div id="footer">
		    <?php include("footer.php"); ?>
		</div>

	</body>
</html>