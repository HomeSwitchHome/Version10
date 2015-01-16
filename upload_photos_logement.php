<?php require_once("config.php");
include("up_house_post.php"); ?>




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
				<?php
				if( !empty($message) )
				{
				echo '<p>',"\n";
				echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
				echo "\t</p>\n\n";
				}
				?>
				<!-- Debut du formulaire -->
				<form enctype="multipart/form-data" action="upload_photos_logement2.php?idlog=<?php echo ($id_logement_photo); ?>" method="post">
					<fieldset>
						<legend>Formulaire <?php echo('/img/'.$id_logement_photo);?></legend>
						<p>
							<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
							<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
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