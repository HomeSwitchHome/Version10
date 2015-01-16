<?php
	session_start();
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
		if(!empty($_POST['pseudo'])){
			if(!empty($_POST['message'])){
				if(empty($errors)){

					
					$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_ajout, IDLogement) VALUES ("'.$_POST['pseudo'].'","'.$_POST['message'].'", NOW(), "'.$idLogement.'")');
					$req->execute();
				}
			}else{
				$errors['message'] = message('Votre message doit être rempli.', 'error');
			}
		}else{
			$errors['pseudo'] = message('Votre pseudo doit être rempli.', 'error');
		}
	}
?>

<?php
// Connexion à la base de données

require_once('config.php');?>



<?php
	// Récupération des commentaires
	$req = $bdd->prepare('SELECT id, pseudo, message, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_ajout FROM minichat WHERE IDLogement="'.$idLogement.'" ORDER BY date_ajout DESC LIMIT 0, 100');
	try{
		$req->execute();
	}catch (Exception $e){
		die('Erreur requête'. $e->getMessage());
	}

	while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
?>
<p><strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> le <?php echo $donnees['date_ajout']; ?> :</p>
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
	<p>Pseudo : </p>
	<p>

		<label for="Votre pseudo"></label>
		<input type="text" name="pseudo" id="pseudo" placeholder="Ex : Mon Prénom" size="30" maxlength="30"  <?php if(empty($_SESSION))echo'disabled'; ?> /><br>

	</p>
	<p>Message :</p>
	<p>
		<textarea name="message" id="message"></textarea><br>
		<?php echo(isset($errors['message']) ? $errors['message'] : ''); ?>
	</p>
	<p>
		<input type="submit" name="submit" value="Envoyer" />
	</p>
</form>