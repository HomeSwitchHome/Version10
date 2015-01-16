<?php require_once("config.php"); ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            <?php include("header.php"); ?>

            <h3 class="register-title">INFORMATIONS DU LOGEMENT</h3>

            <form action="upload_photos_logement.php" method="post" class="register" enctype="multipart/form-data">
        
                <div class="register-left-grid">

                    <div>
                        <label for="titre_annonce">Titre de l'annonce :</label><br/>
                        <input type="text" name="titre_annonce"/>
                    </div>

                    <div>
                        <label for="adresse">Adresse du logement :</label><br/>
                        <input type="text" name="adresse"/>
                    </div>

                    <div>
                        <label for="ville">Ville :</label><br/>
                        <input type="text" name="ville"/>
                    </div>

                    <div>
                        <label for="type">Type de logement :</label>
                        <select name="type">
                            <option value="maison" selected="selected">Maison</option>
                            <option value="appartement">Appartement</option>
                            <option value="mobilehome">Mobile Home</option>
                        </select>
                    </div>

                    <div>
                        <label for="surfaceInterieure">Taille du logement (en m²) :</label>
                        <input type="number" name="surfaceInterieur"/>
                    </div>

                    <div>
                        <label for="nombrePieces">Nombre de pièces :</label>
                        <input type="number" name="nombrePieces"/>
                    </div>

                    <div>
                        <label for="surfaceExterieur">Superficie exterieure :</label>
                        <input type="number" name="surfaceExterieur"/>
                    </div>

                    <div>
                        <label for="nombreLitsSimples">Nombre de lits simples :</label>
                        <input type="number" name="nombreLitsSimples"/>
                    </div>
                    
                    <div>
                        <label for="nombreLitsDoubles">Nombre de lits doubles :</label>
                        <input type="number" name="nombreLitsDoubles"/>
                    </div>

                    <br/>       

                    <div>
                        <label for="description">Description du logement :</label>
                        <textarea name="description" rows="8" cols="45"> </textarea>
                    </div>
                    
                    <div>
                        <label for="descriptionProximite">Description de la proximité :</label>
                        <textarea name="descriptionProximite" rows="8" cols="45"> </textarea>
                    </div>

                

                </div>

                <div class="house-register-right-grid">

                    <div>
                        <p>Remarques ?</p>
                    </div>

                    <div class="pictos">

                        
                        <p class="pictos"><img src="pictos/picto_fumer_interdit.png"/>Espace non fumeur ?</p>

                        <label for="fumeur">Oui
                        <input type="radio" name="fumeur" value="non" class="pictos" checked="checked"/>
                        </label>

                        <label for="fumeur">Non
                        <input type="radio" name="fumeur" value="oui" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_animaux_interdit.png"/>
                        <p class="pictos">Animaux interdits ?</p>

                        <label for="animaux">Oui
                        <input type="radio" name="animaux" value="non" class="pictos" checked="checked"/>
                        </label>

                        <label for="animaux">Non
                        <input type="radio" name="animaux" value="oui" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_bruit_interdit.png"/>
                        <p class="pictos">Bruit interdit ?</p>

                        <label for="bruit">Oui
                        <input type="radio" name="bruit" value="non" class="pictos" checked="checked"/>
                        </label>

                        <label for="bruit">Non
                        <input type="radio" name="bruit" value="oui" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_handicap_auto.png"/>
                        <p class="pictos">Adapté aux handicapés ?</p>

                        <label for="handicap">Oui
                        <input type="radio" name="handicap" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="handicap">Non
                        <input type="radio" name="handicap" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_aeroport.png"/>
                        <p class="pictos">Aéroport à proximité ?</p>

                        <label for="aeroport">Oui
                        <input type="radio" name="aeroport" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="aeroport">Non
                        <input type="radio" name="aeroport" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_train.png"/>
                        <p class="pictos">Gare à proximité ?</p>

                        <label for="gare">Oui
                        <input type="radio" name="gare" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="gare">Non
                        <input type="radio" name="gare" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_garage.png"/>
                        <p class="pictos">Garage disponible ?</p>

                        <label for="garage">Oui
                        <input type="radio" name="garage" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="garage">Non
                        <input type="radio" name="garage" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_wifi.png"/>
                        <p class="pictos">Wifi disponible ?</p>

                        <label for="wifi">Oui
                        <input type="radio" name="wifi" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="wifi">Non
                        <input type="radio" name="wifi" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_jardin.png"/>
                        <p class="pictos">Présence de jardin ?</p>

                        <label for="jardin">Oui
                        <input type="radio" name="jardin" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="jardin">Non
                        <input type="radio" name="jardin" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_piscine.png"/>
                        <p class="pictos">Présence de piscine ?</p>

                        <label for="piscine">Oui
                        <input type="radio" name="piscine" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="piscine">Non
                        <input type="radio" name="piscine" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_television.png"/>
                        <p class="pictos">Présence de TV ?</p>

                        <label for="tv">Oui
                        <input type="radio" name="tv" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="tv">Non
                        <input type="radio" name="tv" value="non" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_plante.png"/>
                        <p class="pictos">Besoin d'arroser des plantes ?</p>

                        <label for="plante">Oui
                        <input type="radio" name="plante" value="oui" class="pictos" checked="checked"/>
                        </label>

                        <label for="plante">Non
                        <input type="radio" name="plante" value="non" class="pictos"/>
                        </label>
                    </div>

                </div>

                <input type="submit" value="Valider" class="submit_button"/>

            </form>

        </div>

        <div id="footer">
            <?php include("footer.php"); ?>
        </div>

    </body>
</html>