<?php require_once("config.php"); 

$messages= [];

$email = null;
$mdp = null;
$user_info = null;
$user = null;

if(!empty($_POST)) {
    if(isset($_POST["email"], $_POST["mdp"])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $messages[] = "Erreur email (mauvais format).";

        if(mb_strlen($mdp) < 8)
            $messages[] = "Erreur mot de passe (8 caractères minimum).";

        $user_info = $bdd -> prepare('SELECT id, email, mdp FROM membres WHERE email=:email');
        $user_info -> execute([":email" => "$email"]);

        if($user_info -> rowCount() != 1)
            $messages[] = "Cet email n'est pas inscrit.";

        $user = $user_info -> fetch(); 
        $mdp = sha1($mdp);

        if($mdp != $user["mdp"])
            $messages[] = "Mot de passe incorrect.";

        if(count($messages) === 0) {
            try {   
                $_SESSION["userID"] = $user["id"];
                header('Location:index.php'); }

            catch(Exception $e) {
                $messages[] = 'Nous sommes incapables de procéder à votre demande. Veuillez réessayer plus tard.'; } 

        }
    }
} ?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" />

    </head>

    <body>

        <div id="wrapper">

            <?php include("header.php"); ?>

            <form method="post" class="login">

                <h3 class="login-title">Connexion</h3>
                <br/>

                <div>
                    <label for="email">Email*</label>
                    <input type="text" id="email" name="email" value="<?= escape($email); ?>"> 
                </div>

                <div>
                    <label for="mdp">Mot de passe*</label>
                    <input type="password" id="mdp" name="mdp" value="<?= escape($mdp); ?>">
                </div>
                <br/>

                <div class="remember_me">
                    <label for="remember_me">Se souvenir de cet ordinateur ?</label>
                    <input type="checkbox" id="remember_me" name="remember_me">
                </div>

                <input type="submit" class="login_submit_button" value="Envoyer">

            </form> 

            <div class="login_errors">
                <?php showErrors($messages) ?>
            </div>

            <div class="login-help">
                <a href="#">Vous avez oublié votre mot de passe ?</a>
            </div>

        </div>

        <?php include("footer.php"); ?>

    </body>

</html>