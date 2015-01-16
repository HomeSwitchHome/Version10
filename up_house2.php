<?php require_once("config.php");
include("up_house_post.php");

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
				
			<?php include("header.php") ?>

			<div id="upload_avatar">

			<!-- Debut du formulaire -->
			<form enctype="multipart/form-data" action="upload_photos_logement.php?idlog=<?php echo($id_logement_photo)?>" method="post">
				<fieldset>
					<legend>Combien de photos souhaitez-vous enregistrer ?</legend>
					<p>
						<select name="nb_photos">
							<option value="1" selected="selected">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
					    </select>
					</p>
					<input type="submit" value="Valider"/>
				</fieldset>
			</form>
			<!-- Fin du formulaire -->
		</div>
		<?php include("footer.php") ?>
	</body>
</html>