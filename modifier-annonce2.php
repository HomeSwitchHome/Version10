<?php require_once("config.php");
require 'functions.php';
$idLogement  = $_GET["idLogement"] ;
// Connexion à la base de données

try{
	$bdd2 = new PDO(
	    'mysql:host=localhost;dbname=hsh',
	    'root',
	    '',
	    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);
	$bdd2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}catch(Exception $e){
        die('Erreur : '.$e->getMessage());
}

debug($_POST);

$sql = 'SELECT id FROM villes WHERE ville = :ville';
// $sql2 = "UPDATE logements (nombrePieces, adresse, description, descriptionSuccincte, villes_id, titre_annonce, surfaceInterieure, surfaceExterieure, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes) SET(:nombrePieces, :adresse, :description, :descriptionSuccincte, :villes_id, :titre_annonce, :surfaceInterieure, :surfaceExterieure, :nombreLitsSimples, :nombreLitsDoubles, :descriptionProximite, :membres_idMembres, :types_idTypes)";
// $sql3 = "UPDATE equipe (logements_id, equipements_id) SET (:logements_id, :equipements_id)";
$sql4 = "UPDATE contraint (logements_id, contraintes_id) SET logements_id = :logements_id, contraintes_id = :contraintes_id";


$stmt = $bdd2->prepare($sql);
// $stmt2 = $bdd2->prepare($sql2);
// $stmt3 = $bdd2->prepare($sql3);
$stmt4 = $bdd2->prepare($sql4);


try {
	$stmt->execute(['ville' => $_POST['ville']]);
	$res = $stmt->fetch();

	// $stmt2->execute(['nombrePieces' => $_POST['nombrePieces'], 'adresse' => $_POST['adresse'], 'description' => $_POST['description'], 'titre_annonce' => $_POST['titre_annonce'], 'surfaceInterieure' => $_POST['surfaceInterieure'], 'surfaceExterieure' => $_POST['surfaceExterieure'], 'nombreLitsSimples' => $_POST['nombreLitsSimples'], 'nombreLitsDoubles' => $_POST['nombreLitsDoubles'], 'descriptionProximite' => $_POST['descriptionProximite'], 'villes_id' => $res['id'], 'membres_idMembres' => $_SESSION['userID'], 'types_idTypes' => $_POST['type']]);
	// $id_logement_photo = $bdd2 -> lastInsertId();

	// foreach ($_POST['equipement'] as $k => $v){
	// 		$stmt3->execute(['logements_id' => $id_logement_photo, 'equipements_id' => $v]);
	// }

	foreach ($_POST['contrainte'] as $k => $v){
			$stmt4->execute(['logements_id' => $idLogement, 'contraintes_id' => $v]);
	}

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