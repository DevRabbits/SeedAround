<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=seedaround', 'root', 'Rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	$logu = $_POST["login"];
	$logp = $_POST["pass"];
	$check = $bdd->query("SELECT * FROM user WHERE login ='".$logu."'");
	$donnees = $check->fetch();
	if ($donnees['pass'] == $logp && $logu != NULL && $logp != NULL)
	{
			session_start();
			$_SESSION['login'] = $logu;
			$_SESSION['pass'] = $logp;
			$_SESSION['propic'] = $donnees['propic'];
			$_SESSION['logged'] = true;
			header("Location: ../index.php");
	}
	else
	{
			header("Location: ../index.php");
	}
?>
