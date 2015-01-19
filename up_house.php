<?php require_once("config.php"); ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Home Switch Home</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <?php
            $sql = "SELECT * FROM villes";

            $stmt = $bdd->prepare($sql);

            try{
                $stmt->execute();
                $nb = $stmt->rowCount();
                $res = $stmt->fetch();
            }catch (PDOException $e) {
                echo $e->getMessage();
            }
        ?>
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

            <h3 class="register-title">INFORMATIONS DU LOGEMENT</h3>

            <form action="upload_photos_logement.php" method="post" class="register" enctype="multipart/form-data" accept-charset="utf-8">
        
                <div class="register-left-grid">

                    <div>
                        <label for="titre_annonce">Titre de l'annonce :</label><br/>
                        <input type="text" name="titre_annonce" value="<?php if(isset($_POST['titre_annonce'])){echo $_POST['titre_annonce'];} ?>" required autofocus />
                    </div>

                    <div>
                        <label for="adresse">Adresse du logement :</label><br/>
                        <input type="text" name="adresse" value="<?php  ?>" required/>
                    </div>

                    <div>
                        <label for="ville">Ville :</label><br/>
                        <input type="text" name="ville" id="ville" list="listeVille" value="<?php  ?>" required/>
                    </div>

                    <div>
                        <label for="type">Type de logement :</label>
                        <select name="type">
                            <option value="1" selected="selected">Maison</option>
                            <option value="2">Appartement</option>
                        </select>
                    </div>

                    <div>
                        <label for="surfaceInterieure">Taille du logement (en m²) :</label>
                        <input type="number" name="surfaceInterieure" value="<?php  ?>" min="0" required/>
                    </div>

                    <div>
                        <label for="nombrePieces">Nombre de pièces :</label>
                        <input type="number" name="nombrePieces" value="<?php  ?>" min="0" required/>
                    </div>

                    <div>
                        <label for="surfaceExterieure">Superficie exterieure :</label>
                        <input type="number" name="surfaceExterieure" value="<?php  ?>" min="0" />
                    </div>

                    <div>
                        <label for="nombreLitsSimples">Nombre de lits simples :</label>
                        <input type="number" name="nombreLitsSimples" value="<?php  ?>" min="0" />
                    </div>
                    
                    <div>
                        <label for="nombreLitsDoubles">Nombre de lits doubles :</label>
                        <input type="number" name="nombreLitsDoubles" value="<?php  ?>" min="0" />
                    </div>

                    <br/>

                    <div>
                        <label for="descriptionSuccincte">Description succincte :</label>
                        <textarea name="descriptionSuccincte" rows="3" cols="45" required><?php  ?></textarea>
                    </div>       

                    <div>
                        <label for="description">Description du logement :</label>
                        <textarea name="description" rows="8" cols="45"><?php  ?></textarea>
                    </div>
                    
                    <div>
                        <label for="descriptionProximite">Description de la proximité :</label>
                        <textarea name="descriptionProximite" rows="8" cols="45"><?php  ?></textarea>
                    </div>                

                </div>

                <div class="house-register-right-grid">

                    <div>
                        <p>Remarques ?</p>
                    </div>

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

                <input type="submit" value="Valider" class="submit_button"/>
                </div>
            </form>

        </div>

        <div id="footer">
            <?php include("footer.php"); ?>
        </div>

    </body>
</html>