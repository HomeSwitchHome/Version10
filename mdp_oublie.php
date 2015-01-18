<?php require_once("config.php");

                   	

?>
<!DOCTYPE html>

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

            <form method="post" class="login" action="mdp_oublie2.php">

                <h3 class="login-title">Mot de passe oublié</h3>
                <br/>

                <div>
                    <label for="email">Email de votre compte</label>
                    <input type="text" id="email" name="email"> 
                </div>

                

                <input type="submit" class="login_submit_button" value="Envoyer">

            </form> 

           
            

        </div>

        <?php include("footer.php"); ?>

    </body>

</html>