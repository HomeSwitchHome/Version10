<?php require_once("config.php"); 

$id = $_SESSION["userID"];

$user_name = $bdd -> prepare('SELECT prenom, nom, email, age, telephone FROM membres WHERE id = :id');
$user_name -> execute([":id" => "$id"]);

$user = $user_name -> fetch();

?>

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

            <div class="profil">
                <div class="colonne_gauche_profil">
                    <div id="avatar">

                        <?php 
                            $filename = "avatars/".$_SESSION["userID"] .'.jpg';

                            if (file_exists($filename)) { 
                                echo('<img src="avatars/'.$_SESSION["userID"].'.jpg" id="image_avatar"><br/>');
                            } else {
                                echo ('<img src="avatars/none.jpg" id="image_avatar"><br/>');
                            }
                        ?>


                        <!--<img src="avatars/none.jpg"><br/>-->
                        <a href="upload_avatar.php" class="avatarChange">Changer votre avatar ?</a>
                        </br>
                    </div>    
                         <div class="liste_logements">
                            <h4>Logements de <?php echo $user["prenom"];?> <?php echo $user["nom"]; ?></h4>
                            
                                <a href="#"><img src="images/maison1.jpg" id="image_liste_logements"></a>
                                <a href="#"><img src="images/maison2.jpg" id="image_liste_logements"></a>
                                <a href="#"><img src="images/maison3.jpg" id="image_liste_logements"></a>

                        </div>   
                    
                </div>
                <div class="colonne_droite_profil">
                    <div id="infosPersoTitre">
        
                        <h1><strong>Informations Générales</strong></h1>

                            <ul class="infosPerso">
                        
                                <li>Nom : <?php echo $user["nom"]; ?> </li>
                                <li>Prénom : <?php echo $user["prenom"]; ?> </li>
                                <li>Age : <?php echo $user["age"]; ?> </li>

                            </ul>
        
                        <h1><strong>Informations de contacts</strong></h1>

                            <ul class="infosPerso">
                        
                                <li>Adresse e-mail : <?php echo $user["email"]; ?> </li>
                                <li>Numéro de téléphone : <?php echo $user["telephone"]; ?> </li>
                                <li>Skype : ... </li>

                            </ul>
            
                         <h1><strong>Notes et commentaires des utilisateurs</strong></h1>

                            <ul class="infosPerso">
                        
                                <li>Moyenne des notes : ... /5</li>
                                <li>Avis : ... </li>

                             </ul>
                    </div>
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </body>
</html>