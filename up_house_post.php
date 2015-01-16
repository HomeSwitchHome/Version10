<?php require_once("config.php");
require 'functions.php';
// Connexion à la base de données
/*$nombrePieces = $_POST['nombrePieces'];
$description = $_POST['description'];
$titre_annonce = $_POST['titre_annonce'];
$surfaceInterieur = $_POST['surfaceInterieur'];
$surfaceExterieur = $_POST['surfaceExterieur'];
$description = $_POST['description'];
$nombreLitsSimples = $_POST['nombreLitsSimples'];
$nombreLitsDoubles = $_POST['nombreLitsDoubles'];
$descriptionProximite = $_POST['descriptionProximite'];



$sql = "INSERT INTO logements (nombrePieces, description, titre_annonce, surfaceInterieur, surfaceExterieur, nombreLitsSimples, nombreLitsDoubles , descriptionProximite ,membres_idMembres, types_idTypes) 
		VALUES($nombrePieces, '$description', '$titre_annonce', $surfaceInterieur, $surfaceExterieur, $nombreLitsSimples, $nombreLitsDoubles, '$descriptionProximite',5, 1)";*/
$nombrePieces = $_POST['nombrePieces'];
$description = $_POST['description'];
$titre_annonce = $_POST['titre_annonce'];
$surfaceInterieur = $_POST['surfaceInterieur'];
$surfaceExterieur = $_POST['surfaceExterieur'];
$nombreLitsSimples = $_POST['nombreLitsSimples'];
$nombreLitsDoubles = $_POST['nombreLitsDoubles'];
$descriptionProximite = $_POST['descriptionProximite'];
$membreid = $_SESSION["userID"];


$sql = "INSERT INTO logements (nombrePieces, description, titre_annonce, surfaceInterieur, surfaceExterieur, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes) 
		VALUES($nombrePieces, '$description', '$titre_annonce', $surfaceInterieur, $surfaceExterieur, $nombreLitsSimples, $nombreLitsDoubles, '$descriptionProximite', $membreid, 1)";

//debug($sql);

$stmt = $bdd->prepare($sql);



//$stmt->bindParam(':nombrePieces',$_POST['nombrePieces'], PDO::PARAM_STR);
//$stmt->bindParam(':description',$_POST['description'], PDO::PARAM_STR);
try {
	$stmt->execute(['nombrePieces' => $nombrePieces, 'description' => $description,'titre_annonce' => $titre_annonce, 'surfaceInterieur' => $surfaceInterieur,'surfaceExterieur' => $surfaceExterieur,'nombreLitsSimples' => $nombreLitsSimples,'nombreLitsDoubles' => $nombreLitsDoubles,'descriptionProximite' => $descriptionProximite]);
	$id_logement_photo = $bdd -> lastInsertId();
} catch (PDOException $e) {
	echo $e->getMessage();
}

print_r($res);
//debug($res);



?>