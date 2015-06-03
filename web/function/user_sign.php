<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=seedaround', 'root', 'Rabbit');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
<?php
	if (isset($_POST['mail']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['password']) && isset($_POST['passwordval']) && isset($_POST['activity']) && $_POST['password'] == $_POST['passwordval'])
	{
		$value1 = $_POST['mail'];
		$value2 = $_POST['lastname'];
		$value3 = $_POST['firstname'];
		$value4 = $_POST['password'];
		$value5 = $_POST['activity'];

		$other1 = $_POST['propic'];
		$other2 = $_POST['activitypic'];
		$other3 = $_POST['resume'];
		$other4 = 0;

		$signreq = $bdd->prepare("INSERT INTO user (mail, lastname, firstname, password, activity, propic, activitypic, resume, supporters) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$signreq->bindParam(1, $value1);
		$signreq->bindParam(2, $value2);
		$signreq->bindParam(3, $value3);
		$signreq->bindParam(4, $value4);
		$signreq->bindParam(5, $value5);
		$signreq->bindParam(6, $other1);
		$signreq->bindParam(7, $other2);
		$signreq->bindParam(8, $other3);
		$signreq->bindParam(9, $other4);
		$signreq->execute();

		session_start();
		$_SESSION['mail'] = $value1;
		$_SESSION['lastname'] = $value2;
		$_SESSION['firstname'] = $value3;
		$_SESSION['activity'] = $value5;
		$_SESSION['propic'] = $other1;
		$_SESSION['activitypic'] = $other2;
		$_SESSION['resume'] = $other3;
		$_SESSION['supporters'] = $other4;
		$_SESSION['logged'] = true;
		header("Location: ../index.php");
	}
?>
