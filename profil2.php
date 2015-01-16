<?php require_once("config.php"); ?>

<?php /*
// lancement de la requete
$sql = mysql_query('SELECT nom, prenom FROM membres WHERE id = $_SESSION["userID"]') or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
//$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on recupere le resultat sous forme d'un tableau
$data = mysql_fetch_array($sql);

// on libère l'espace mémoire alloué pour cette interrogation de la base
mysql_free_result ($sql);
mysql_close ();*/
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

                        <img src="avatars/none.jpg"><br/>
                        <a href="#" class="avatarChange">Changer votre avatar ?</a>
                        </br>
                        <h4>Logements de ...</h4>
                        <div class="liste_logements">
                            <a href="#"><img src="images/maison1.jpg" id="image_liste_logements"></a>
                            <a href="#"><img src="images/maison2.jpg" id="image_liste_logements"></a>
                            <a href="#"><img src="images/maison3.jpg" id="image_liste_logements"></a>
                        </div>   
                    </div>
                </div>
                <div class="colonne_droite_profil">
                    <div id="infosPersoTitre">
        
                        <h1><strong>Informations Générales</strong></h1>

                            <ul class="infosPerso">
                        
                                <li>Nom : ... <?php echo($_SESSION["userID"])?> </li>
                                <li>Prénom : <?php echo($data['prenom'])?> </li>
                                <li>Age : ... </li>

                            </ul>

                    
        
                        <h1><strong>Informations de contacts</strong></h1>

                            <ul class="infosPerso">
                        
                                <li>Adresse e-mail : ...</li>
                                <li>Numéro de téléphone : ... </li>
                                <li>Skype : ... </li>

                            </ul>

                
            
                         <h1><strong>Notes et commentaires des utilisateurs</strong></h1>

                            <ul class="infosPerso">
                        
                                <li>Moyenne des notes : /5</li>
                                <li>Avis : ... </li>

                             </ul>
                    </div>
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </body>
</html>