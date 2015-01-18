<!DOCTYPE html>
<html>
	<head>
		<title>Recherche Avancée</title>
		<meta charset="utf-8" />
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
		<div id="wrapper">
			<?php include("header.php"); ?>
			<br/><br/><br/>
			<h1 align="center">Recherche</h1>
				<form method="get" action="search.php" class="recherche">

					<label><input type="text" id="recherche-simple" name="q" placeholder="Tapez votre recherche" /></label>
				
				<input type="submit" value="Rechercher" class="submit_button"/>
				</form>


				<br/><br/><h1 align="center">Recherche avancée</h1>
				<form method="post" action="resultat-recherche.php" class="recherche">
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

					<label>Type </label><select name="types_idTypes">
					<option value="1">Maison</option>
					<option value="2">Appartement</option>
					</select></br>
				</fieldset>

				<h4>Nombre de couchages</h4>
				<fieldset>
					<label>Capacité total supérieur à </label><input name="capaciteTotale" type="number" min="1" max="9999" /></br>
					<label><input type="number" name="nombreLitsDoubles[Min]" min="0" max="9999" /> < Nombre de lits doubles < </label><input type="number" name="nombreLitsDoubles[Max]" min="0" max="9999" /></br>
					<label><input type="number" name="nombreLitsSimples[Min]" min="0" max="9999" /> < Nombre de lits simples < </label><input type="number" name="nombreLitsSimples[Max]" min="0" max="9999" /></br>
				</fieldset>

				<h4>Surface</h4>
				<fieldset>
					<label>Surface supérieur à <input type="number" name="surfaceTotale" min="1" max="9999" /></label></br>
					<label><input type="number" name="surfaceInterieure[Min]" min="0" max="9999" > < Surface intérieur < <input type="number" name="surfaceInterieure[Max]" min="1" max="9999" /></label></br>
					<label><input type="number" name="surfaceExterieure[Min]"  min="0" max="9999" > < Surface extérieur < <input type="number" name="surfaceExterieure[Max]" min="1" max="9999" /></label></br>
				</fieldset>

				<h4>Nombre de pièces</h4>
				<fieldset>
					<label>Nombre de pièces > <input type="number" name="nombrePieces" /></label>
				</fieldset>
				<h4>Note</h4>
				<fieldset>
					<label>Note supérieur à <input type="number" name="nombreClick" /></label>
				</fieldset>

				<h4>Equipements</h4>
                    <fieldset>
                        <label>Garage <input type="checkbox" name="equipement[garage]" value="1"></label>
                        <label>Jardin <input type="checkbox" name="equipement[jardin]" value="2"></label>
                        <label>Piscine <input type="checkbox" name="equipement[piscine]" value="3"></label>
                        <label>Télévision <input type="checkbox" name="equipement[television]" value="4"></label>
                        <label>Train <input type="checkbox" name="equipement[train]" value="5"></label>
                        <label>Handicap <input type="checkbox" name="equipement[handicap]" value="6"></label>
                        <label>Wifi <input type="checkbox" name="equipement[wifi]" value="7"></label>
                        <label>Cuisine <input type="checkbox" name="equipement[cuisine]" value="8"></label>
                        <label>Aéroport <input type="checkbox" name="equipement[aeroport]" value="9"></label>
                    </fieldset>
                    <h4>Contraintes </h4>
                    <fieldset>
                        <label>Animaux autorisés <input type="checkbox" name="contrainte[animauxAutorises]" value="1"></label>
                        <label>Animaux interdits <input type="checkbox" name="contrainte[animauxInterdits]" value="2"></label>
                        <label>Bruit autorisé <input type="checkbox" name="contrainte[bruitAutorise]" value="3"></label>
                        <label>Bruit interdit <input type="checkbox" name="contrainte[bruitInterdit]" value="4"></label>
                        <label>Fumé autorisé <input type="checkbox" name="contrainte[fumeAutorise]" value="5"></label>
                        <label>Fumé interdite <input type="checkbox" name="contrainte[fumeInterdite]" value="6"></label>
                        <label>Plantes <input type="checkbox" name="contrainte[plantes]" value="7"></label>
                    </fieldset>

					<input type="submit" value="Rechercher" class="submit_button"/>
					<input type="reset" value="Annuler" class="reset_button"/>
			</form>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>