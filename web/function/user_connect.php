<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=seedaround', 'root', 'Rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	$logu = $_POST["mail"];
	$logp = $_POST["password"];
	$check = $bdd->query("SELECT * FROM user WHERE mail ='".$logu."'");
	$donnees = $check->fetch();
	if ($donnees['password'] == $logp && $logu != NULL && $logp != NULL)
	{
			session_start();
			$_SESSION['mail'] = $logu;
			$_SESSION['lastname'] = $donnees['lastname'];
			$_SESSION['firstname'] = $donnees['firstname'];
			$_SESSION['activity'] = $donnees['activity'];
			$_SESSION['propic'] = $donnees['propic'];
			$_SESSION['activitypic'] = $donnees['activitypic'];
			$_SESSION['resume'] = $donnees['resume'];
			$_SESSION['supporters'] = $donnees['supporters'];
			$_SESSION['logged'] = true;
			header("Location: ../index.php");
	}
	else
	{
			header("Location: ../index.php");
	}
?>
