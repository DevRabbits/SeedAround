<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="../script/bootstrap.js"></script>
		<script type="text/javascript" src="../script/jquery.js"></script>
		<script type="text/javascript" src="../script/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/script.js"></script>
		<meta charset="utf-8">
		<title>GreatPost</title>
	</head>
	<body>
		<?php
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=seedaround', 'root', 'Rabbit');
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		?>
		<?php session_start(); ?>
	</body>
</html>
