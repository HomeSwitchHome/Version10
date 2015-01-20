<!DOCTYPE html>
<html>
	<head>
		<title>Recherche Avancée</title>
		<meta charset="utf-8" />
		<link href="style.css" rel="stylesheet" />
	</head>

	<body>
		<?php
            require_once("config.php");

            $sql = "SELECT * FROM villes";
            $sql2 = "SELECT * FROM departements";
            $sql3 = "SELECT * FROM regions";

            $stmt = $bdd->prepare($sql);
            $stmt2 = $bdd->prepare($sql2);
            $stmt3 = $bdd->prepare($sql3);

            try{
                $stmt->execute();
                $stmt2->execute();
                $stmt3->execute();

                $nb = $stmt->rowCount();
                $nb2 = $stmt2->rowCount();
                $nb3 = $stmt3->rowCount();

                $res = $stmt->fetch();
                $res2 = $stmt2->fetch();
                $res3 = $stmt3->fetch();
            }catch (PDOException $e) {
                echo $e->getMessage();
            }
        ?>
        <datalist id="listeRegion">
            <?php 
                $i = 0;
                while ($i < $nb3){
                    echo '<option value='.$res3['region'].'>';
                    $res3 = $stmt3->fetch();
                    $i++;
                }
            ?>  
        </datalist>
        <datalist id="listeDepartement">
            <?php 
                $i = 0;
                while ($i < $nb2){
                    echo '<option value='.$res2['departement'].'>';
                    $res2 = $stmt2->fetch();
                    $i++;
                }
            ?>  
        </datalist>
        <datalist id="listeVille">
            <?php 
                $i = 0;
                while ($i < $nb){
                    echo '<option value='.$res['ville'].'>';
                    $res = $stmt->fetch();
                    $i++;
                }
            ?>  
        </datalist>
	
		<div id="wrapper">
			<?php include("header.php"); ?>
			<br/><br/><br/>
			<h1 align="center">Recherche</h1>
				<form method="get" action="search.php" class="recherche">

					<label><input type="text" id="recherche-simple" name="q" placeholder="Tapez votre recherche (au minimum quatre caractères)" pattern=".{4,}" required title="4 caractères minimum" autofocus/></label>
				
				<input type="submit" value="Rechercher" class="submit_button"/>
				</form>


				<br/><br/><h1 align="center">Recherche avancée</h1>
				<form method="post" action="resultat-recherche.php" class="recherche">
				
				
				<h4>Lieu</h4>
				<!--<fieldset>
					<label>Pays <input type="text" name="Pays" list="listePays" /></label>
				</fieldset>-->

				<fieldset>
					<input type="text" name="lieu[region]" list="listeRegion" placeholder="Région" />
				</fieldset>

				<fieldset>
					<input type="text" name="lieu[departement]" list="listeDepartement" placeholder="Département" />
				</fieldset>

				<fieldset>
                    <input type="text" name="lieu[ville]" list="listeVille" placeholder="Ville" />
				</fieldset>

				<h4>Type de logement</h4>
				<fieldset>
					<select name="types_idTypes">
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
					<label>Surface total supérieur à <input type="number" name="surfaceTotale" min="1" max="9999" /></label></br>
					<label><input type="number" name="surfaceInterieure[Min]" min="0" max="9999" > < Surface intérieur < <input type="number" name="surfaceInterieure[Max]" min="1" max="9999" /></label></br>
					<label><input type="number" name="surfaceExterieure[Min]"  min="0" max="9999" > < Surface extérieur < <input type="number" name="surfaceExterieure[Max]" min="1" max="9999" /></label></br>
				</fieldset>

				<h4>Nombre de pièces</h4>
				<fieldset>
					<label>Nombre de pièces > <input type="number" name="nombrePieces" /></label>
				</fieldset>
				<h4>Popularité</h4>
				<fieldset>
					<label>Nombre de demande supérieur <input type="number" name="nombreClick" /></label>
				</fieldset>

				<h4>Equipements</h4>
                    <fieldset>
                        <label>Garage <input type="checkbox" name="equipements_id[garage]" value="1"></label>
                        <label>Jardin <input type="checkbox" name="equipements_id[jardin]" value="2"></label>
                        <label>Piscine <input type="checkbox" name="equipements_id[piscine]" value="3"></label>
                        <label>Télévision <input type="checkbox" name="equipements_id[television]" value="4"></label>
                        <label>Train <input type="checkbox" name="equipements_id[train]" value="5"></label>
                        <label>Handicap <input type="checkbox" name="equipements_id[handicap]" value="6"></label>
                        <label>Wifi <input type="checkbox" name="equipements_id[wifi]" value="7"></label>
                        <label>Cuisine <input type="checkbox" name="equipements_id[cuisine]" value="8"></label>
                        <label>Aéroport <input type="checkbox" name="equipements_id[aeroport]" value="9"></label>
                    </fieldset>
                    <h4>Contraintes </h4>
                    <fieldset>
                        <label>Animaux autorisés <input type="checkbox" name="contraintes_id[animauxAutorises]" value="1"></label>
                        <label>Animaux interdits <input type="checkbox" name="contraintes_id[animauxInterdits]" value="2"></label>
                        <label>Bruit autorisé <input type="checkbox" name="contraintes_id[bruitAutorise]" value="3"></label>
                        <label>Bruit interdit <input type="checkbox" name="contraintes_id[bruitInterdit]" value="4"></label>
                        <label>Fumé autorisé <input type="checkbox" name="contraintes_id[fumeAutorise]" value="5"></label>
                        <label>Fumé interdite <input type="checkbox" name="contraintes_id[fumeInterdite]" value="6"></label>
                        <label>Plantes <input type="checkbox" name="contraintes_id[plantes]" value="7"></label>
                    </fieldset>

					<input type="submit" value="Rechercher" class="submit_button"/>
					<input type="reset" value="Annuler" class="reset_button"/>
			</form>
			<?php include("footer.php"); ?>
		</div>
	</body>
</html>