<?php 
require_once("config.php");

$sql = 'SELECT id FROM villes WHERE ville = :ville';
$stmt = $bdd->prepare($sql);
try{
	$stmt->execute(['ville' => $_POST['ville']]);
	$res = $stmt->fetch();
}catch (PDOException $e) {
	echo $e->getMessage();
}
if(empty($res)){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'up_house.php';

	$save = $_POST;
	$_SESSION['save'] = $save;
header("Location: http://$host$uri/$extra");
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
		<?php require("up_house_post.php"); ?>
		<div id="wrapper">
				
			<?php include("header.php") ?>

			<div id="upload_avatar">
				<?php
				if( !empty($message) )
				{
				echo '<p>',"\n";
				echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
				echo "\t</p>\n\n";
				}
				?>
				<!-- Debut du formulaire -->
				<form enctype="multipart/form-data" action="upload_photos_logement2.php?idlog=<?php if(isset($id_logement_photo))echo ($id_logement_photo); ?>" method="post">
					<fieldset>
						<legend>Formulaire (taille max: 2.0Mo, 3200x2400px max)</legend>
						<p>
							<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
							<input type="hidden" name="MAX_FILE_SIZE"  />
							<input name="fichier" type="file" id="fichier_a_uploader" />
							<input type="submit" name="submit" value="Uploader" />
						</p>
					</fieldset>
				</form>
				<!-- Fin du formulaire -->
			</div>
		</div>
		<?php include("footer.php") ?>
	</body>
</html>