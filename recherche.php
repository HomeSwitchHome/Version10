<!DOCTYPE html>
<html>
	<head>
		<title>Recherche Avancée</title>
		<meta charset="utf-8" />
		<!-- <link href="style.css" rel="stylesheet" /> -->
		<link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<div>
	</div>
		<?php include("header.php"); ?>
		<h1>Recherchez un logement</h1>
			<form method="post" action="" >
				<h4>Mots clefs</h4>
				<fieldset>
					<label><input type="search" name="recherche" placeholder="Tapez votre recherche" <?php if (empty($_SESSION)) echo 'disabled'; ?>/></label>
				</fieldset>
				<h4>Choisissez un lieu</h4>
				<fieldset>
					<label>Pays </label><select name="pays">
					<option value="">France</option>
					</select></br>
					<label>Région </label><select name="région">
					<option value="">région</option>
					</select></br>
					<label>Département </label><select name="département">
					<option value="">département</option>
					</select></br>
					<label>Ville </label><select name="ville">
					<option value="">Levallois-Perret</option>
					</select></br>
				</fieldset>
				<h4>Type de logement</h4>
				<fieldset>
					<label>Type </label><select name="type">
					<option value="">Appartement</option>
					<option value="">Maison</option>
					<option value="">Villa</option>
					</select></br>
				</fieldset>
				<h4>Nombre de couchages</h4>
				<fieldset>
					<label>Capacité total </label><input type="number" min="1" max="9999" value="1" /></br>
					<label>Nombre de lits doubles </label><input type="number" min="1" max="9999" value="1" /></br>
					<label>Nombre de lits simples </label><input type="number" min="1" max="9999" value="1" /></br>
				</fieldset>
				<h4>Surface</h4>
				<fieldset>
					<label>Surface <input type="number" min="1" max="9999" value="1" /></label></br>
					<label>Surface intérieur <input type="number" min="1" max="9999" value="1" /></label></br>
					<label>Surface extérieur <input type="number" min="1" max="9999" value="1" /></label></br>
				</fieldset>
				<h4>Nombre de pièces</h4>
				<fieldset>
					<label>Nombre de pièces <input type="number" name="rooms" value="1" min="1" max="50" ></label>
				</fieldset>
				<h4>Note</h4>
				<fieldset>
					<label>Note supérieur à <input type="number" name="Note" value="1" min="1" max="10" /></label>
				</fieldset>
				<h4>Equipements</h4>
					<label>Garage <input type="checkbox" name="garage" value=""></label>
					<label>Jardin <input type="checkbox" name="jardin" value=""></label>
					<label>Piscine <input type="checkbox" name="piscine" value=""></label>
					<label>Télévision <input type="checkbox" name="télévision" value=""></label>
					<label>Train <input type="checkbox" name="train" value=""></label>
					<label>Handicap <input type="checkbox" name="handicap" value=""></label>
					<label>Wifi <input type="checkbox" name="wifi" value=""></label>
					<label>Cuisine <input type="checkbox" name="Cuisine" value=""></label>
					<label>Aéroport <input type="checkbox" name="aéroport" value=""></label>
				<fieldset>
				</fieldset>
				<h4>Contraintes </h4>
				<fieldset>
					<label>Animaux autorisés <input type="checkbox" name="animauxAutorisés" value=""></label>
					<label>Animaux interdits <input type="checkbox" name="animauxInterdits" value=""></label>
					<label>Bruit autorisé <input type="checkbox" name="bruitAutorisé" value=""></label>
					<label>Bruit interdit <input type="checkbox" name="bruitInterdit" value=""></label>
					<label>Fumé autorisé <input type="checkbox" name="fuméAutorisé" value=""></label>
					<label>Fumé interdite <input type="checkbox" name="fuméInterdite" value=""></label>
					<label>Plantes <input type="checkbox" name="plantes" value=""></label>
				</fieldset>
					<input type="submit" name="Rechercher" value="Rechercher" />
					<input type="reset" name="Annuler" value="Annuler" />
			</form>
			<?php include("footer.php"); ?>
	</body>
</html>