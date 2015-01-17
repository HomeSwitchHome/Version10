<?php require_once("config.php"); ?>

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
                            <option value="1" selected="selected">Maison</option>
                            <option value="2">Appartement</option>
                        </select>
                    </div>

                    <div>
                        <label for="surfaceInterieure">Taille du logement (en m²) :</label>
                        <input type="number" name="surfaceInterieure"/>
                    </div>

                    <div>
                        <label for="nombrePieces">Nombre de pièces :</label>
                        <input type="number" name="nombrePieces"/>
                    </div>

                    <div>
                        <label for="surfaceExterieure">Superficie exterieure :</label>
                        <input type="number" name="surfaceExterieure"/>
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
                        <textarea name="description" rows="8" cols="45"></textarea>
                    </div>
                    
                    <div>
                        <label for="descriptionProximite">Description de la proximité :</label>
                        <textarea name="descriptionProximite" rows="8" cols="45"></textarea>
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

                    <!-- <div class="pictos">

                        <img src="pictos/picto_fumer_interdit.png"/>
                        <p class="pictos">Espace non fumeur ?</p>

                        <label for="fumeur">Oui
                        <input type="radio" name="fumeur" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="fumeur">Non
                        <input type="radio" name="fumeur" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_animaux_interdit.png"/>
                        <p class="pictos">Animaux interdits ?</p>

                        <label for="animaux">Oui
                        <input type="radio" name="animaux" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="animaux">Non
                        <input type="radio" name="animaux" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_bruit_interdit.png"/>
                        <p class="pictos">Bruit interdit ?</p>

                        <label for="bruit">Oui
                        <input type="radio" name="bruit" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="bruit">Non
                        <input type="radio" name="bruit" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_handicap_auto.png"/>
                        <p class="pictos">Adapté aux handicapés ?</p>

                        <label for="handicap">Oui
                        <input type="radio" name="handicap" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="handicap">Non
                        <input type="radio" name="handicap" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_aeroport.png"/>
                        <p class="pictos">Aéroport à proximité ?</p>

                        <label for="aeroport">Oui
                        <input type="radio" name="aeroport" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="aeroport">Non
                        <input type="radio" name="aeroport" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_train.png"/>
                        <p class="pictos">Gare à proximité ?</p>

                        <label for="gare">Oui
                        <input type="radio" name="gare" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="gare">Non
                        <input type="radio" name="gare" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_garage.png"/>
                        <p class="pictos">Garage disponible ?</p>

                        <label for="garage">Oui
                        <input type="radio" name="garage" value="garage" class="pictos" checked="checked"/>
                        </label>

                        <label for="garage">Non
                        <input type="radio" name="garage" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_wifi.png"/>
                        <p class="pictos">Wifi disponible ?</p>

                        <label for="wifi">Oui
                        <input type="radio" name="wifi" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="wifi">Non
                        <input type="radio" name="wifi" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_jardin.png"/>
                        <p class="pictos">Présence de jardin ?</p>

                        <label for="jardin">Oui
                        <input type="radio" name="jardin" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="jardin">Non
                        <input type="radio" name="jardin" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_piscine.png"/>
                        <p class="pictos">Présence de piscine ?</p>

                        <label for="piscine">Oui
                        <input type="radio" name="piscine" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="piscine">Non
                        <input type="radio" name="piscine" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/pict_television.png"/>
                        <p class="pictos">Présence de TV ?</p>

                        <label for="tv">Oui
                        <input type="radio" name="tv" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="tv">Non
                        <input type="radio" name="tv" value="0" class="pictos"/>
                        </label>
                        <br/>

                        <img src="pictos/picto_plante.png"/>
                        <p class="pictos">Besoin d'arroser des plantes ?</p>

                        <label for="plante">Oui
                        <input type="radio" name="plante" value="1" class="pictos" checked="checked"/>
                        </label>

                        <label for="plante">Non
                        <input type="radio" name="plante" value="0" class="pictos"/>
                        </label>
                    </div> -->

                </div>

                <input type="submit" value="Valider" class="submit_button"/>

            </form>

        </div>

        <div id="footer">
            <?php include("footer.php"); ?>
        </div>

    </body>
</html>