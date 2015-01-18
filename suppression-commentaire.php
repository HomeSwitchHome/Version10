<?php require_once("config.php"); 
$idCommentaire = $_GET["idCommentaire"];
$idLogement = $_GET["idLogement"];
 ?>


<html>
    <head>
        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="style.css" rel="stylesheet" />
    </head>
	<body>
		<?php include("header.php"); ?>
	    <div id="wrapper">
		    <div id="user_list">

				<?php 
					if (isadmin()) {
						$delete = $bdd -> prepare("DELETE FROM minichat WHERE id = '$idCommentaire' ");
						$delete -> execute();
						
					}
				?>
				<h3>Le commentaire a bien été supprimé</h3>
				<h2><a href="page-logement.php?idLogement=<?php echo($idLogement);?>#commentaires">Retour aux commentaires</a></h2>
			</div>
		</div>
	</body>
</html>