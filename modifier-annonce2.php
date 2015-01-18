<?php require_once("config.php");
$idLogement  = $_GET["idLogement"] ;

$sql = 'SELECT id FROM villes WHERE ville = :ville';
$sql2 = "UPDATE logements SET nombrePieces = :nombrePieces, adresse = :adresse, description = :description, descriptionSuccincte = :descriptionSuccincte, villes_id = :villes_id, titre_annonce = :titre_annonce, surfaceInterieure = :surfaceInterieure, surfaceExterieure = :surfaceExterieure, nombreLitsSimples = :nombreLitsSimples, nombreLitsDoubles = :nombreLitsDoubles, descriptionProximite = :descriptionProximite, membres_idMembres = :membres_idMembres, types_idTypes = :types_idTypes WHERE id = :logements_id";
$sql3 = "DELETE FROM equipe WHERE logements_id = $idLogement";
$sql4 = "DELETE FROM contraint WHERE logements_id = $idLogement";
$sql5 = "INSERT INTO equipe (logements_id, equipements_id) VALUES (:logements_id, :equipements_id)";
$sql6 = "INSERT INTO contraint (logements_id, contraintes_id) VALUES (:logements_id, :contraintes_id)";


$stmt = $bdd->prepare($sql);
$stmt2 = $bdd->prepare($sql2);
$stmt3 = $bdd->prepare($sql3);
$stmt4 = $bdd->prepare($sql4);
$stmt5 = $bdd->prepare($sql5);
$stmt6 = $bdd->prepare($sql6);


try {
	$stmt->execute(['ville' => $_POST['ville']]);
	$res = $stmt->fetch();

	$stmt2->execute(['nombrePieces' => $_POST['nombrePieces'], 'adresse' => $_POST['adresse'], 'description' => $_POST['description'], 'descriptionSuccincte' => $_POST['descriptionSuccincte'], 'titre_annonce' => $_POST['titre_annonce'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'descriptionProximite' => $_POST['descriptionProximite'], 'villes_id' => $res['id'], 'membres_idMembres' => $_SESSION['userID'], 'types_idTypes' => $_POST['type'], 'logements_id' => $idLogement]);

	foreach ($_POST['equipement'] as $k => $v){
			$stmt3->execute(['logements_id' => $idLogement, 'equipements_id' => $v]);
	}

	foreach ($_POST['contrainte'] as $k => $v){
			$stmt4->execute(['logements_id' => $idLogement, 'contraintes_id' => $v]);
	}

	foreach ($_POST['equipement'] as $k => $v){
			$stmt5->execute(['logements_id' => $idLogement, 'equipements_id' => $v]);
	}

	foreach ($_POST['contrainte'] as $k => $v){
			$stmt6->execute(['logements_id' => $idLogement, 'contraintes_id' => $v]);
	}

} catch (PDOException $e) {
	echo $e->getMessage();
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
				
			<?php include("header.php") ?>
			<div id="user_list">
				<h3>Votre annonce a été modifiée</h3>
				<h2>Voulez vous : <a href="upload_more_photos.php?idlog=<?php echo($idLogement);?>">Ajouter d'autres photos ?</a> ou <a href="index.php">Retourner à la page d'accueil ?</a></h2>
			</div>
			
		</div>
		<?php include("footer.php") ?>
	</body>
</html>