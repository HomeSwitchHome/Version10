<?php
require_once("config.php");
if (isset($_SESSION["userID"])&&!empty($_SESSION['userID']))
/************************************************************
* Definition des constantes / tableaux et variables
*************************************************************/
// Constantes
//define('TARGET', '/files/'); // Repertoire cible
define('MAX_SIZE', 1500000); // Taille max en octets du fichier
define('WIDTH_MAX', 1000); // Largeur max de l'image en pixels
define('HEIGHT_MAX', 1000); // Hauteur max de l'image en pixels
// Tableaux de donnees
$tabExt = array('jpg'/*,'gif','png','jpeg'*/); // Extensions autorisees
$infosImg = array();
// Variables
$extension = '';
$message = '';
$nomImage = '';
/************************************************************
* Creation du repertoire cible si inexistant
*************************************************************/
/*if( !is_dir(TARGET) ) {
if( !mkdir(TARGET, 0755) ) {
exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
}
}*/
/************************************************************
* Script d'upload
*************************************************************/
if(!empty($_POST)) {
	// On verifie si le champ est rempli
	if( !empty($_FILES['fichier']['name']) ) {
		// Recuperation de l'extension du fichier
		$extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
			// On verifie l'extension du fichier
			if(in_array(strtolower($extension),$tabExt)) {
				// On recupere les dimensions du fichier
				$infosImg = getimagesize($_FILES['fichier']['tmp_name']);
					// On verifie le type de l'image
					if($infosImg[2] >= 1 && $infosImg[2] <= 14) {
						// On verifie les dimensions et taille de l'image
						if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE)) {
							// Erreurs
							if(isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK === $_FILES['fichier']['error']) {
								// On renomme le fichier
								$nomImage = "avatars/".$_SESSION["userID"] .'.'. $extension;
								// Si c'est OK, on teste l'upload
								if(move_uploaded_file($_FILES['fichier']['tmp_name'], $nomImage)) {
									$message = 'Upload réussi !'; }
								else {
									// Sinon on affiche une erreur
									$message = 'Problème lors de l\'upload !'; }
							}
							else {
								$message = 'Une erreur interne a empêché l\'uplaod de l\'image'; }
						}
						else {
							// Sinon erreur sur les dimensions et taille de l'image
							$message = 'Erreur dans les dimensions de l\'image !'; }
					}
					else {
						// Sinon erreur sur le type de l'image
						$message = 'Le fichier à uploader n\'est pas une image !'; }
			}
			else {
				// Sinon on affiche une erreur pour l'extension
				$message = 'L\'extension du fichier est incorrecte !'; }
	}
	else {
		// Sinon on affiche une erreur pour le champ vide
		$message = 'Veuillez remplir le formulaire svp !'; }
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

			<div id="upload_avatar">
				<?php
				if( !empty($message) ){
					echo '<p>',"\n";
					echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
					echo "\t</p>\n\n";
				}
				?>
				<!-- Debut du formulaire -->
				<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<fieldset>
						<legend>Formulaire (taille max: 1.5Mo, 1000x1000px max)</legend>
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
