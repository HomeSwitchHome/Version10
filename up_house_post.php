<?php

$sql2 = "INSERT INTO logements (nombrePieces, adresse, description, descriptionSuccincte, villes_id, titre_annonce, surfaceInterieure, surfaceExterieure, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes) VALUES(:nombrePieces, :adresse, :description, :descriptionSuccincte, :villes_id, :titre_annonce, :surfaceInterieure, :surfaceExterieure, :nombreLitsSimples, :nombreLitsDoubles, :descriptionProximite, :membres_idMembres, :types_idTypes)";
$sql3 = "INSERT INTO equipe (logements_id, equipements_id) VALUES (:logements_id, :equipements_id)";
$sql4 = "INSERT INTO contraint (logements_id, contraintes_id) VALUES (:logements_id, :contraintes_id)";

$stmt2 = $bdd->prepare($sql2);
$stmt3 = $bdd->prepare($sql3);
$stmt4 = $bdd->prepare($sql4);

try {
	$stmt2->execute(['nombrePieces' => $_POST['nombrePieces'], 'adresse' => $_POST['adresse'], 'description' => $_POST['description'], 'descriptionSuccincte' => $_POST['descriptionSuccincte'], 'titre_annonce' => $_POST['titre_annonce'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'descriptionProximite' => $_POST['descriptionProximite'], 'villes_id' => $res['id'], 'membres_idMembres' => $_SESSION['userID'], 'types_idTypes' => $_POST['type']]);
	$id_logement_photo = $bdd -> lastInsertId();

	if(isset($_POST['equipement'])){
		foreach ($_POST['equipement'] as $k => $v){
			$stmt3->execute(['logements_id' => $id_logement_photo, 'equipements_id' => $v]);
		}
	}

	if(isset($_POST['contrainte'])){
		foreach ($_POST['contrainte'] as $k => $v){
			$stmt4->execute(['logements_id' => $id_logement_photo, 'contraintes_id' => $v]);
		}
	}
}catch (PDOException $e) {
	echo $e->getMessage();
}
?>