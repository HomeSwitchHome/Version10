<?php
	if(!isset($_SESSION)){
		session_start();
	}
	function message ($message, $type = null){
	$color = $type === 'error' ? '#ff0000' : '#1E824c';
	return '<div style="font-size:16px;color:' . $color . ';">' . $message . '</div>';
	}
?> 
<!-- Ajout d'un commentaire -->
<?php
	if (!empty($_POST)){
		$form = array();
		$errors = array();
		$pseudo=$comments['prenom']." ".$comments['nom'];
			if(!empty($_POST['message'])){
				if(empty($errors)){

					
					$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, dateAjout, IDLogement) VALUES ("'.$pseudo.'","'.$_POST['message'].'", NOW(), "'.$idLogement.'")');
					$req->execute();
				}
			}else{
				$errors['message'] = message('Votre message doit être rempli.', 'error');
			}
		
	}
?>

<?php
// Connexion à la base de données

require_once('config.php');?>



<?php
	// Récupération des commentaires
	$req = $bdd->prepare('SELECT id, pseudo, message, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %Hh%imin%ss\') AS dateAjout FROM minichat WHERE IDLogement="'.$idLogement.'" ORDER BY dateAjout DESC LIMIT 0, 100');
	try{
		$req->execute();
	}catch (Exception $e){
		die('Erreur requête'. $e->getMessage());
	}

	while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
?>
<p><strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> le <?php echo $donnees['dateAjout']; ?> :</p><?php if (isadmin()) {echo('<a href="suppression-commentaire.php?idCommentaire='.$donnees['id'].'&idLogement='.$idLogement.'">X</a>');}?>
<p><?php echo nl2br(htmlspecialchars($donnees['message'])); ?></p>

<?php
}
?>

<?php
// Fin de la boucle des commentaires
$req->closeCursor();
?><br />

<h3> Ajouter un commentaire: </h3><br />
<form method="post" action="#commentaires">
	
	<p>Message :</p>
	<p>
		<textarea name="message" id="message" <?php if(empty($_SESSION) || !isverified())echo'disabled';?>></textarea><br>
		<?php echo(isset($errors['message']) ? $errors['message'] : ''); ?>
	</p>
	<p>
		<input type="submit" name="submit" value="Envoyer" />
	</p>
</form>