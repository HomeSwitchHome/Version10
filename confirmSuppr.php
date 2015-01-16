<?php require_once("config.php"); 
$idlog = $_GET["idlog"];
 
					
				    if (isadmin()) {
						$envoidelete = $bdd -> prepare("DELETE FROM logements WHERE id = '$idlog' ");
						$envoidelete -> execute();
					}
				?>

