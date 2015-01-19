<?php require_once("config.php");

$save = array();
if(isset($_SESSION['save'])){
    $save = $_SESSION['save'];
    $_SESSION['save'] = null;
}
?>

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
                        <input type="text" name="titre_annonce" value="<?php if(isset($save['titre_annonce'])){echo $save['titre_annonce'];} ?>" required autofocus />
                    </div>

                    <div>
                        <label for="adresse">Adresse du logement :</label><br/>
                        <input type="text" name="adresse" value="<?php if(isset($save['adresse'])){echo $save['adresse'];} ?>" required/>
                    </div>

                    <div>
                        <label for="ville">Ville :</label><br/>
                        <input type="text" name="ville" id="ville" list="listeVille" value="<?php if(isset($save['ville'])){echo $save['ville'];} ?>" required/>
                    </div>

                    <div>
                        <label for="type">Type de logement :</label>
                        <select name="type">
                            <option value="1" <?php if(!isset($save['choix']) || $save['choix'] == 1){echo 'selected="selected"';} ?>>Maison</option>
                            <option value="2" <?php if(isset($save['choix']) && $save['choix'] == 2){echo 'selected="selected"';} ?>>Appartement</option>
                        </select>
                    </div>

                    <div>
                        <label for="surfaceInterieure">Taille du logement (en m²) :</label>
                        <input type="number" name="surfaceInterieure" value="<?php if(isset($save['surfaceInterieure'])){echo $save['surfaceInterieure'];} ?>" min="0" required/>
                    </div>

                    <div>
                        <label for="nombrePieces">Nombre de pièces :</label>
                        <input type="number" name="nombrePieces" value="<?php if(isset($save['nombrePieces'])){echo $save['nombrePieces'];} ?>" min="0" required/>
                    </div>

                    <div>
                        <label for="surfaceExterieure">Superficie exterieure :</label>
                        <input type="number" name="surfaceExterieure" value="<?php if(isset($save['surfaceExterieure'])){echo $save['surfaceExterieure'];} ?>" min="0" />
                    </div>

                    <div>
                        <label for="nombreLitsSimples">Nombre de lits simples :</label>
                        <input type="number" name="nombreLitsSimples" value="<?php if(isset($save['nombreLitsSimples'])){echo $save['nombreLitsSimples'];} ?>" min="0" />
                    </div>
                    
                    <div>
                        <label for="nombreLitsDoubles">Nombre de lits doubles :</label>
                        <input type="number" name="nombreLitsDoubles" value="<?php if(isset($save['nombreLitsDoubles'])){echo $save['nombreLitsDoubles'];} ?>" min="0" />
                    </div>

                    <br/>

                    <div>
                        <label for="descriptionSuccincte">Description succincte :</label>
                        <textarea name="descriptionSuccincte" rows="3" cols="45" required><?php if(isset($save['descriptionSuccincte'])){echo $save['descriptionSuccincte'];} ?></textarea>
                    </div>       

                    <div>
                        <label for="description">Description du logement :</label>
                        <textarea name="description" rows="8" cols="45"><?php if(isset($save['description'])){echo $save['description'];} ?></textarea>
                    </div>
                    
                    <div>
                        <label for="descriptionProximite">Description de la proximité :</label>
                        <textarea name="descriptionProximite" rows="8" cols="45"><?php if(isset($save['descriptionProximite'])){echo $save['descriptionProximite'];} ?></textarea>
                    </div>                

                </div>

                <div class="house-register-right-grid">

                    <div>
                        <p>Remarques ?</p>
                    </div>

                    <h4>Equipements</h4>
                    <fieldset>
                        <label>Garage <input type="checkbox" name="equipement[garage]" value="1" <?php if(isset($save['equipement']['garage']) && $save['equipement']['garage'] == 1) echo 'checked="checked"'; ?> ></label>
                        <label>Jardin <input type="checkbox" name="equipement[jardin]" value="2" <?php if(isset($save['equipement']['jardin']) && $save['equipement']['jardin'] == 2) echo 'checked="checked"'; ?> ></label>
                        <label>Piscine <input type="checkbox" name="equipement[piscine]" value="3" <?php if(isset($save['equipement']['piscine']) && $save['equipement']['piscine'] == 3) echo 'checked="checked"'; ?> ></label>
                        <label>Télévision <input type="checkbox" name="equipement[television]" value="4" <?php if(isset($save['equipement']['television']) && $save['equipement']['television'] == 4) echo 'checked="checked"'; ?> ></label>
                        <label>Train <input type="checkbox" name="equipement[train]" value="5" <?php if(isset($save['equipement']['train']) && $save['equipement']['train'] == 5) echo 'checked="checked"'; ?> ></label>
                        <label>Handicap <input type="checkbox" name="equipement[handicap]" value="6" <?php if(isset($save['equipement']['handicap']) && $save['equipement']['handicap'] == 6) echo 'checked="checked"'; ?> ></label>
                        <label>Wifi <input type="checkbox" name="equipement[wifi]" value="7" <?php if(isset($save['equipement']['wifi']) && $save['equipement']['wifi'] == 7) echo 'checked="checked"'; ?> ></label>
                        <label>Cuisine <input type="checkbox" name="equipement[cuisine]" value="8" <?php if(isset($save['equipement']['cuisine']) && $save['equipement']['cuisine'] == 8) echo 'checked="checked"'; ?> ></label>
                        <label>Aéroport <input type="checkbox" name="equipement[aeroport]" value="9" <?php if(isset($save['equipement']['aeroport']) && $save['equipement']['aeroport'] == 9) echo 'checked="checked"'; ?> ></label>
                    </fieldset>
                    <h4>Contraintes </h4>
                    <fieldset>
                        <label>Animaux autorisés <input type="checkbox" name="contrainte[animauxAutorises]" value="1" <?php if(isset($save['contrainte']['animauxAutorises']) && $save['contrainte']['animauxAutorises'] == 1) echo 'checked="checked"'; ?> ></label>
                        <label>Animaux interdits <input type="checkbox" name="contrainte[animauxInterdits]" value="2" <?php if(isset($save['contrainte']['animauxInterdits']) && $save['contrainte']['animauxInterdits'] == 2) echo 'checked="checked"'; ?> ></label>
                        <label>Bruit autorisé <input type="checkbox" name="contrainte[bruitAutorise]" value="3" <?php if(isset($save['contrainte']['bruitAutorise']) && $save['contrainte']['bruitAutorise'] == 3) echo 'checked="checked"'; ?> ></label>
                        <label>Bruit interdit <input type="checkbox" name="contrainte[bruitInterdit]" value="4" <?php if(isset($save['contrainte']['bruitInterdit']) && $save['contrainte']['bruitInterdit'] == 4) echo 'checked="checked"'; ?> ></label>
                        <label>Fumé autorisé <input type="checkbox" name="contrainte[fumeAutorise]" value="5" <?php if(isset($save['contrainte']['fumeAutorise']) && $save['contrainte']['fumeAutorise'] == 5) echo 'checked="checked"'; ?> ></label>
                        <label>Fumé interdite <input type="checkbox" name="contrainte[fumeInterdite]" value="6" <?php if(isset($save['contrainte']['fumeInterdite']) && $save['contrainte']['fumeInterdite'] == 6) echo 'checked="checked"'; ?> ></label>
                        <label>Plantes <input type="checkbox" name="contrainte[plantes]" value="7" <?php if(isset($save['contrainte']['plantes']) && $save['contrainte']['plantes'] == 7) echo 'checked="checked"'; ?> ></label>
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