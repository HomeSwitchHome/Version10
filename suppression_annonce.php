<?php require_once("config.php"); 
$idlog = $_GET["idLogement"];
$logement_info = $bdd -> prepare('SELECT membres_idMembres
                                    FROM logements WHERE id = '.$idlog);
$logement_info -> execute();

$result = $logement_info -> fetch();
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
						if ($result['membres_idMembres'] = $_SESSION['userID']) {
						$envoidelete = $bdd -> prepare("DELETE FROM logements WHERE id = '$idlog' ");
						$envoidelete -> execute();
						$dir = 'img/'.$idlog;
						rrmdir($dir);
					}
				?>

				<div align="center"><a href="index.php"><h3>Retour page accueil</h3></a></div>
			</div>
		</div>
	</body>
</html>