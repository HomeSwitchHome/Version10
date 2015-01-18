<?php
	session_start();

	define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
	require 'functions.php';

	function bddConnect(){

		$databases =array(

			'default' => array(
				'host'		=> 'localhost',
				'database'	=> 'hsh',
				'login'		=> 'root',
				'password'	=> 'root',
			)
		);

		$thisConf = 'default';
		$conf = $databases[$thisConf];

		try{
			global $bdd;
			$bdd = new PDO(
				'mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
			$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	bddConnect();
/*----------------------------------------------------------------------------------------------------------------------------*/

	function escape($text)
		{
		return htmlspecialchars($text, ENT_QUOTES);
		}

/*----------------------------------------------------------------------------------------------------------------------------*/

	function showErrors($messages)
		{
        $messages = (array) $messages;
 
        //Count != 0 donc ça équivaut à un true pour php
        if(count($messages))
        	{
            foreach($messages AS $error)
            	{
?>

	<span class="error"><?= escape($error); ?></span>

<?php
                }
        	}
		}

/*----------------------------------------------------------------------------------------------------------------------------*/

	function isConnected()
		{ 
		return isset($_SESSION["userID"]) && $_SESSION["userID"];
		}

/*----------------------------------------------------------------------------------------------------------------------------*/

	function isadmin()
	{ 
		$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (!empty($_SESSION["userID"])) {
		$verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
                $verifadmin -> execute();
                $numadmin = $verifadmin->fetch();
                if ($numadmin['admin'] == 1) {return TRUE;}
        }else{
        	return false;
        } 
	}

/*----------------------------------------------------------------------------------------------------------------------------*/

	function isverified()
	{ 
		$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (!empty($_SESSION["userID"])) {
		$verif = $bdd -> prepare("SELECT compteActif FROM membres WHERE id =".$_SESSION["userID"]);
                $verif -> execute();
                $verified = $verif->fetch();
                if ($verified['compteActif'] == 1) {return TRUE;}
        }else{
        	return false;
        } 
	}

/*----------------------------------------------------------------------------------------------------------------------------*/

	function rrmdir($dir) {
   		if (is_dir($dir)) {
     	$objects = scandir($dir);
     	foreach ($objects as $object) {
       	if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   		}
 	}

/*----------------------------------------------------------------------------------------------------------------------------*/

 	function webroot($url) {
		trim($url,'/');
		return BASE_URL.'/'.$url;
	}

/*----------------------------------------------------------------------------------------------------------------------------*/

	


	/*function isadmin2()
	{
		ob_start();
		$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$reponse = 'FALSE';
		$verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
                $verifadmin -> execute();
                $numadmin = $verifadmin->fetch();
                if ($numadmin['admin'] == 1) {$reponse='TRUE';}
        echo "hey";
        echo $reponse; 
        $isadmin2=ob_get_clean();
        return $isadmin2;

	}*/

	/*function annonceProfil()
		{
			$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$profil = $bdd -> prepare("SELECT id, membres_idMembres FROM logements WHERE membres_idMembres=".$_SESSION['userID']);
			$profil -> execute();
			while ($photoLogements = $profil -> fetch())
			{
				echo("<a href=\"#\"><img src=\"img/$/1.jpg\" id=\"image_liste_logements\"></a>");
			}
		}*/
	
	/*function annonceProfil($identifiant)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$profil = $bdd -> prepare("SELECT id, membres_idMembres FROM logements WHERE membres_idMembres=".$id);
        $profil -> execute();
        while ($photoLogements = $profil -> fetch())
        {
        $image = '<a href="img/'.$photoLogements['id'].'/1.jpg"><img src="img/'.$photoLogements['id'].'/1.jpg" id="image_liste_logements"></a>';
        echo ($image);
        }
	}*/

?>