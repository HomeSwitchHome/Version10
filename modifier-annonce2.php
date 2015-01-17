<?php require_once("config.php");
require 'functions.php';
$idLogement  = $_GET["idLogement"] ;
// Connexion à la base de données

try
    {
	      $bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', '', [
	      		PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
	      	]);
    }
catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

$sql = 'SELECT id FROM villes WHERE ville = :ville';
$sql2 = "INSERT INTO logements (nombrePieces, adresse, description, villes_id, titre_annonce, surfaceInterieure, surfaceExterieure, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes) VALUES(:nombrePieces, :adresse, :description, :villes_id, :titre_annonce, :surfaceInterieure, :surfaceExterieure, :nombreLitsSimples, :nombreLitsDoubles, :descriptionProximite, :membres_idMembres, :types_idTypes)";
$sql3 = "INSERT INTO equipe (logements_id, equipements_id) VALUES (:logements_id, :equipements_id)";

$stmt = $bdd->prepare($sql);
$stmt2 = $bdd->prepare($sql2);
$stmt3 = $bdd->prepare($sql3);

try {
	$stmt->execute(['ville' => $_POST['ville']]);
	$res = $stmt->fetch();

	$stmt2->execute(['nombrePieces' => $_POST['nombrePieces'], 'adresse' => $_POST['adresse'], 'description' => $_POST['description'], 'titre_annonce' => $_POST['titre_annonce'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'descriptionProximite' => $_POST['descriptionProximite'], 'villes_id' => $res['id'], 'membres_idMembres' => $_SESSION['userID'], 'types_idTypes' => $_POST['type']]);
	$id_logement_photo = $bdd -> lastInsertId();

} catch (PDOException $e) {
	echo $e->getMessage();
}
?>




<html>
	<head>
		<meta charset="utf-8" />
		<title>Home Switch Home</title>
		<link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" />
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