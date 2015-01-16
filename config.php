<?php
	session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

	function isadmin()
	{ 
				$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$verifadmin = $bdd -> prepare("SELECT admin FROM membres WHERE id =".$_SESSION["userID"]);
                $verifadmin -> execute();
                $numadmin = $verifadmin->fetch();
                if ($numadmin['admin'] == 1) {return TRUE;} 
	}	

	/*function isadmin2()
	{
		ob_start();
		$bdd = new PDO('mysql:host=localhost;dbname=hsh', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
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

	
	

?>