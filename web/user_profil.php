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
		<img src="../img/back.jpeg" class="img_background">
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
						<!--<li><a href="./around.php"><span class="glyphicon glyphicon-leaf"></span> Autour de vous</a></li>--> 
					</ul>
					<form class="navbar-form navbar-left" role="search" method="POST" action="./function/user_search.php">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Rechercher un Agriculteur">
						</div>
						<button type="submit" class="btn btn-default">Rechercher</button>
					</form>
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
		<div class="ui_header col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php if ($_SESSION['propic'] == NULL):?>
			<div class="profilpic"><img src="../img/unpic.png"></div>
			<?php else:?>
			<div class="profilpic"><img src="<?php echo $_SESSION['propic'];?>"></div>
			<?php endif;?>
			<h3 class="profilname">Profil de <strong><?php echo $_SESSION['firstname'] ." ". $_SESSION['lastname'];?></strong></h3>
			<h3 class="profilfollow"><?php echo $_SESSION['supporters'];?> <span class="glyphicon glyphicon-globe"></span></h3>
		</div>
		<div class="ui_headerbis col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"></div>
		<div class="ui_mainimg col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php if ($_SESSION['activity'] == "Autre"):?>
			<img src="../img/autre.png"></div>
			<?php elseif ($_SESSION['activity'] == "Agroalimentaire"):?>
			<img src="../img/agro.jpg"></div>
			<?php elseif ($_SESSION['activity'] == "Aquaculture"):?>
			<img src="../img/aqua.jpg"></div>
			<?php elseif ($_SESSION['activity'] == "Animal"):?>
			<img src="../img/ani.jpg"></div>
			<?php elseif ($_SESSION['activity'] == "Sylviculture"):?>
			<img src="../img/sylvi.jpg"></div>
			<?php elseif ($_SESSION['activity'] == "Viticulture"):?>
			<img src="../img/viti.jpg"></div>
			<?php elseif ($_SESSION['activity'] == "Arboriculture"):?>
			<img src="../img/arbo.jpg"></div>
			<?php elseif ($_SESSION['activity'] == "Horticulture"):?>
			<img src="../img/horti.png"></div>
			<?php endif;?>
		</div>
		<div class="ui_nav col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2"></div>
		<div class="ui_main col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2"></div>
		<div class="seedfoot col-md-12"></div>
		<div class="seedfoot1 col-md-12"></div>
		<div class="seedfoot2 col-md-12"></div>
	</body>
</html>
