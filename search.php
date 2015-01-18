<?php
	require_once("config.php"); 
	$q=$_GET['q'];

    $s=explode(" ", $q);
    $sql="SELECT * FROM logements";
    $ii=0;
    foreach ($s as $mot) {
        if(strlen($mot)>3) {
            if ($ii==0) {
                $sql.=" WHERE ";
            }
            else {
                $sql.=" OR ";
            }
            $sql.="titre_annonce LIKE '%$mot%' OR descriptionSuccincte LIKE '%$mot%' OR description LIKE '%$mot%'";
            $ii++;
        }
    }
    $req = $bdd -> prepare($sql);
    $req ->execute();

	$ligne = $req-> fetch();
    $nb = $req->rowCount();

    if($nb==0){
        include('resultat-recherche4.php');
    }else{
        include('resultat-recherche3.php');
    }
?>