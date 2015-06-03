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
		<link rel="icon" type="image/png" href="../img/favicon.png"/>
		<title>SeedArround - Profil de l'utilisateur></title>
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
		<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				  	<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="#">SeedAround</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="./index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
						<li><a href="./map.php"><span class="glyphicon glyphicon-cloud"></span> Map interactive</a></li>
						<li><a href="./around.php"><span class="glyphicon glyphicon-leaf"></span> Autour de vous</a></li> 
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> <?php echo $_SESSION['mail'];?><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="./user_profil.php"><span class="glyphicon glyphicon-user"></span> Mon Profil</a></li>
								<li><a href="./user_stats.php"><span class="glyphicon glyphicon-signal"></span> Mes Statistiques</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-cog"> Paramètres</a></li> 
								<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messagerie</a></li> 
								<li><a href="./function/user_disconnect.php"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<?php else: ?>
			<?php header("Location: ./index.php");?>
		<?php endif; ?>
	</body>
</html>
