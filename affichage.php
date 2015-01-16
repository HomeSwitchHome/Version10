<?php //affichage de l'entête du tableau

 
//nom du répertoire contenant les images à afficher
$nom_repertoire = 'img/';
 
//on ouvre le repertoire
$pointeur = opendir($nom_repertoire);
$i = 0;
 
//on les stocke les noms des fichiers des images trouvées, dans un tableau
while ($fichier = readdir($pointeur)){
	if (substr($fichier, -3) == "gif" || substr($fichier, -3) == "jpg" || substr($fichier, -3) == "png"
	|| substr($fichier, -4) == "jpeg" || substr($fichier, -3) == "PNG" || substr($fichier, -3) == "GIF"
	|| substr($fichier, -3) == "JPG"){
		$tab_image[$i] = $fichier;
		$i++;
	}
}
 
//on ferme le répertoire
closedir($pointeur);
 
//on trie le tableau par ordre alphabétique
array_multisort($tab_image, SORT_ASC);
 
//affichage des images (en 60 * 60 ici)
for ($j=0;$j<=$i-1;$j++){
	$image = '<div class="liste_logements">
				<a href="'.$nom_repertoire.'/'.$tab_image[$j].'"><img src="'.$nom_repertoire.'/'.$tab_image[$j].'" id="image_liste_logements"></a>
			  </div>';
	 
	echo ($image);
}
?>