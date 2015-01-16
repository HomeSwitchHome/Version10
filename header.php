<?php require_once("config.php"); ?>

<div id="menu-wrapper">
       
        <div id="menu" class="container">
       
                <ul>
       
                        <li><a href="index.php"><img src="logo2.png" height="40" width="40" id="logo2"></a></li>
                        <li><a href="logement.php">Logements</a></li>
                        <li><a href="recherche.php">Recherche</a></li>
 
<?php
       
        if(!isConnected()) {
                echo "<li><a href=\"inscription.php\">Inscription</a></li>";
                echo "<li><a href=\"login.php\">Connexion</a></li>"; }
 
        else {
                echo "<li><a href=\"up_house.php\">Annonce</a></li>";
                echo "<li><a href=\"profil.php\">Profil</a></li>";

                /*$verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
                $verifadmin -> execute();
                $numadmin = $verifadmin->fetch();

                if ($numadmin['admin'] == 1) */
                        if (isadmin()) {echo ("<li><a href=\"modif1.php\">Administration</a></li>");}
                //if(isadmin()) {echo ("<li><a href=\"modif1.php\">Administration</a></li>";}

                echo "<li><a href=\"logout.php\">Déconnexion</a></li>";
                
        }
 
?>
 
                        <li><a href="index.php"><img src="logo2.png" height="40" width="40" id="logo2"></a></li>
                </ul>
       
        </div>
 
</div>