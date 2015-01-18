<?php require_once("config.php");
$idLogement  = $_GET["idLogement"] ;
//$idLogement = 49;

$f = array();

try{
    $logement_info = $bdd -> prepare("SELECT nombrePieces, description, descriptionSuccincte, titre_annonce, surfaceInterieure, surfaceExterieure, nombreLitsSimples, nombreLitsDoubles, descriptionProximite, membres_idMembres, types_idTypes, adresse, villes_id
                                FROM logements WHERE id = $idLogement");
    $logement_info -> execute();
    $result = $logement_info -> fetch();

    $logement_info2 = $bdd -> prepare('SELECT ville FROM villes WHERE id = '.$result['villes_id']);
    $logement_info2 -> execute();
    $result2 = $logement_info2 -> fetch();

    $logement_info3 = $bdd -> prepare("SELECT equipements_id FROM equipe WHERE logements_id = $idLogement");
    $logement_info3 -> execute();
    $result3 = $logement_info3 -> fetchAll();

    $logement_info4 = $bdd -> prepare("SELECT contraintes_id FROM contraint WHERE logements_id = $idLogement");
    $logement_info4 -> execute();
    $result4 = $logement_info4 -> fetchAll();
}catch(Exception $e){
        die('Erreur : '.$e->getMessage());
}
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            <?php include("header.php"); ?>

            <h3 class="register-title">INFORMATIONS DU LOGEMENT</h3>

            <form action="modifier-annonce2.php?idLogement=<?php echo $idLogement; ?>" method="post" class="register" enctype="multipart/form-data" accept-charset="utf-8">
        
                <div class="register-left-grid">

                    <div>
                        <label for="titre_annonce">Titre de l'annonce :</label><br/>
                        <input type="text" name="titre_annonce" value="<?php echo $result['titre_annonce']; ?>" required/>
                    </div>

                    <div>
                        <label for="adresse">Adresse du logement :</label><br/>
                        <input type="text" name="adresse" value="<?php echo $result['adresse']; ?>" required/>
                    </div>

                    <div>
                        <label for="ville">Ville :</label><br/>
                        <input type="text" name="ville" value="<?php echo $result2['ville']; ?>" required/>
                    </div>

                    <div>
                        <label for="type">Type de logement :</label>
                        <select name="type">
                            <option value="1" <?php if($result['types_idTypes']==1){echo 'selected="selected"';} ?> >Maison</option>
                            <option value="2" <?php if($result['types_idTypes']==2){echo 'selected="selected"';} ?> >Appartement</option>
                        </select>
                    </div>

                    <div>
                        <label for="surfaceInterieure">Taille du logement (en m²) :</label>
                        <input type="number" name="surfaceInterieure" value="<?php echo $result['surfaceInterieure']; ?>" required/>
                    </div>

                    <div>
                        <label for="nombrePieces">Nombre de pièces :</label>
                        <input type="number" name="nombrePieces" value="<?php echo $result['nombrePieces']; ?>" required/>
                    </div>

                    <div>
                        <label for="surfaceExterieure">Superficie exterieure :</label>
                        <input type="number" name="surfaceExterieure" value="<?php echo $result['surfaceExterieure']; ?>"/>
                    </div>

                    <div>
                        <label for="nombreLitsSimples">Nombre de lits simples :</label>
                        <input type="number" name="nombreLitsSimples" value="<?php echo $result['nombreLitsSimples']; ?>"/>
                    </div>
                    
                    <div>
                        <label for="nombreLitsDoubles">Nombre de lits doubles :</label>
                        <input type="number" name="nombreLitsDoubles" value="<?php echo $result['nombreLitsDoubles']; ?>"/>
                    </div>

                    <br/> 

                    <div>
                        <label for="descriptionSuccincte">Description succincte :</label>
                        <textarea name="descriptionSuccincte" rows="3" cols="45" required><?php echo $result['descriptionSuccincte']; ?></textarea>
                    </div>           

                    <div>
                        <label for="description">Description du logement :</label>
                        <textarea name="description" rows="8" cols="45" ><?php echo $result['description']; ?></textarea>
                    </div>
                    
                    <div>
                        <label for="descriptionProximite">Description de la proximité :</label>
                        <textarea name="descriptionProximite" rows="8" cols="45" ><?php echo $result['descriptionProximite']; ?></textarea>
                    </div>

                

                </div>

                <div class="house-register-right-grid">

                    <div>
                        <p>Remarques ?</p>
                    </div>

                    <h4>Equipements</h4>
                    <fieldset>
                        <label>Garage <input type="checkbox" name="equipement[garage]" value="1" <?php foreach($result3 as $k => $v){if($v['equipements_id']==1){echo 'checked';}} ?> ></label>
                        <label>Jardin <input type="checkbox" name="equipement[jardin]" value="2" <?php foreach($result3 as $k => $v){if($v['equipements_id']==2){echo 'checked';}} ?> ></label>
                        <label>Piscine <input type="checkbox" name="equipement[piscine]" value="3" <?php foreach($result3 as $k => $v){if($v['equipements_id']==3){echo 'checked';}} ?> ></label>
                        <label>Télévision <input type="checkbox" name="equipement[television]" value="4" <?php foreach($result3 as $k => $v){if($v['equipements_id']==4){echo 'checked';}} ?> ></label>
                        <label>Train <input type="checkbox" name="equipement[train]" value="5" <?php foreach($result3 as $k => $v){if($v['equipements_id']==5){echo 'checked';}} ?> ></label>
                        <label>Handicap <input type="checkbox" name="equipement[handicap]" value="6" <?php foreach($result3 as $k => $v){if($v['equipements_id']==6){echo 'checked';}} ?> ></label>
                        <label>Wifi <input type="checkbox" name="equipement[wifi]" value="7" <?php foreach($result3 as $k => $v){if($v['equipements_id']==7){echo 'checked';}} ?> ></label>
                        <label>Cuisine <input type="checkbox" name="equipement[cuisine]" value="8" <?php foreach($result3 as $k => $v){if($v['equipements_id']==8){echo 'checked';}} ?> ></label>
                        <label>Aéroport <input type="checkbox" name="equipement[aeroport]" value="9" <?php foreach($result3 as $k => $v){if($v['equipements_id']==9){echo 'checked';}} ?> ></label>
                    </fieldset>
                    <h4>Contraintes </h4>
                    <fieldset>
                        <label>Animaux autorisés <input type="checkbox" name="contrainte[animauxAutorises]" value="1" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==1){echo 'checked';}} ?> ></label>
                        <label>Animaux interdits <input type="checkbox" name="contrainte[animauxInterdits]" value="2" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==2){echo 'checked';}} ?> ></label>
                        <label>Bruit autorisé <input type="checkbox" name="contrainte[bruitAutorise]" value="3" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==3){echo 'checked';}} ?> ></label>
                        <label>Bruit interdit <input type="checkbox" name="contrainte[bruitInterdit]" value="4" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==4){echo 'checked';}} ?> ></label>
                        <label>Fumé autorisé <input type="checkbox" name="contrainte[fumeAutorise]" value="5" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==5){echo 'checked';}} ?> ></label>
                        <label>Fumé interdite <input type="checkbox" name="contrainte[fumeInterdite]" value="6" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==6){echo 'checked';}} ?> ></label>
                        <label>Plantes <input type="checkbox" name="contrainte[plantes]" value="7" <?php foreach($result4 as $k => $v){if($v['contraintes_id']==7){echo 'checked';}} ?> ></label>
                    </fieldset>

                    <!-- <div class="pictos">

                        
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
                    </div> -->

                </div>

                <input type="submit" value="Modifier" class="submit_button"/>

            </form>

        </div>

        <div id="footer">
            <?php include("footer.php"); ?>
        </div>

    </body>
</html>