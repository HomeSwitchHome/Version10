<?php

    if(isset($_GET['term'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['term']);
 
        // Connexion à la base de données
        require ('../Modele/connexion.php');
 
        // Requête SQL
        $requete = "SELECT identifiant FROM user WHERE identifiant LIKE '". $q ."%' LIMIT 0, 10";
        $resultat = $bdd->query($requete);

        // Exécution de la requête SQL
        $liste = [];
        while($donnees = $resultat->fetch(PDO::FETCH_NUM)) {
            $liste[] = $donnees[0];
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($liste);
    }
?>