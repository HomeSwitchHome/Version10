<?php require_once("config.php"); 
$id  = $_GET["idPersonne"] ;
$user_name = $bdd -> prepare('SELECT prenom, nom, email, age, telephone FROM membres WHERE id = '.$id);
$user_name -> execute();

$result = $user_name -> fetch();

 ?>


<html>
    <head>
        <meta charset="utf-8" />
        <title>Home Switch Home</title>
        <link href="http://fonts.googleapis.com/css?family=Oxygen:400,700,300" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" />
    </head>
	<body>
		<?php include("header.php"); ?>
		<div id="wrapper">
			<div id="user_list">

				<?php
				$verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
				$verifadmin -> execute();
				$numadmin = $verifadmin->fetch();
				if ($numadmin['admin'] == 1){
				?>

				<form name="insertion" action="modif3.php" method="POST">
					<input type="hidden" name="id" value="<?php echo($id) ;?>">
					<table border="0" align="center" cellspacing="2" cellpadding="2">
						<tr align="center">
							<td>Nom</td>
							<td><input type="text" name="nom" value="<?php echo($result['nom']) ;?>"></td>
						</tr>
						<tr align="center">
							<td>Prenom</td>
							<td><input type="text" name="prenom" value="<?php echo($result['prenom']) ;?>"></td>
						</tr>
						<tr align="center">
							<td>E-mail</td>
							<td><input type="text" name="email" value="<?php echo($result['email']) ;?>"></td>
						</tr>
						<tr align="center">
							<td>Age</td>
							<td><input type="text" name="age" value="<?php echo($result['age']) ;?>"></td>
						</tr>
						<tr align="center">
							<td>Télephone</td>
							<td><input type="text" name="telephone" value="<?php echo($result['telephone']) ;?>"></td>
						</tr>
						<tr align="center">
							<td colspan="2"><input type="submit" value="modifier"></td>
						</tr>
					</table>
				</form>
				<?php } ?>

			</div>
		</div>
		<?php include("footer.php");?>
	</body>
</html>