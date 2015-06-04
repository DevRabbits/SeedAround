<?php
//(1) On inclut la classe de Google Maps pour générer ensuite la carte.
require('./class/GoogleMapAPI.class.php');

//(2) On crée une nouvelle carte; Ici, notre carte sera $map.
$map = new GoogleMapAPI('map');

//(3) On ajoute la clef de Google Maps.
$map->setAPIKey('AIzaSyCp6TXe102Zh_U9cZFUSbctFUIOsg24L9E');

//(4) On ajoute les caractéristiques que l'on désire à notre carte.
$map->setWidth("1200");
$map->setHeight("500");
$map->setCenterCoords ('1.0143050000000358', '48.471285');
$map->setZoomLevel (14.999);
$map->setMapType('hybrid');
$map->setInfoWindowTrigger('mouseover');
$map->disableDirections();
$map->disableZoomEncompass();
$map->addMarkerByCoords( '1.0143050000000358', '48.471285', "Wheat");

//(5) On applique la base XHTML avec les fonctions à appliquer ainsi que le onload du body.
?>
<!DOCTYPE html>
<html xmlns="" xml:lang="fr" >
	<head>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="../script/bootstrap.js"></script>
		<script type="text/javascript" src="../script/jquery.js"></script>
		<script type="text/javascript" src="../script/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/script.js"></script>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="../img/favicon.png" />
		<title>SeedArround - Map interactive</title>
	</head>
	<body onload="onLoad();">
		<?php
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=seedaround', 'root', 'weed1990');
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		?>
		<?php session_start(); ?>
		<img src="../img/back.jpeg" class="img_background">
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
						<li><a href="./index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
						<li class="active"><a href="./map.php"><span class="glyphicon glyphicon-cloud"></span> Map interactive</a></li>
						<li><a href="./around.php"><span class="glyphicon glyphicon-leaf"></span> Autour de vous</a></li> 
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
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
						<?php else: ?>
						<li><a href="#" data-toggle="modal" data-target="#signModal"><span class="glyphicon glyphicon-user"></span> S'enregistrer</a></li>
						<li><a href="#" data-toggle="modal" data-target="#connectModal"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
						<?php endif; ?>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="col-md-10 col-md-offset-1 showmap">
			<?php $map->printHeaderJS(); ?>
			<?php $map->printMapJS(); ?>
			<?php $map->printMap(); ?>
		</div>
		<div id="signModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">S'enregistrer</h4>
							<p><strong>Les champs marqués d'un <span class="red">*</span><strong> sont obligatoires.</p>
					</div>
					<div class="modal-body">
						<form role="form" method="POST" action="./function/user_sign.php">
							<div class="form-group">
								<label for="mail"><span class="red">*</span> Adresse mail :</label>
								<input type="mail" name="mail" class="form-control" id="mail">
							</div>
							<div class="form-group">
								<label for="lastname"><span class="red">*</span> Nom :</label>
								<input type="text" name="lastname" class="form-control" id="lastname">
							</div>
							<div class="form-group">
								<label for="firstname"><span class="red">*</span> Prénom :</label>
								<input type="text" name="firstname" class="form-control" id="firstname">
							</div>
							<div class="form-group">
								<label for="password"><span class="red">*</span> Mot de passe :</label>
								<input type="password" name="password" class="form-control" id="password">
							</div>
							<div class="form-group">
								<label for="passwordval"><span class="red">*</span> Confirmation :</label>
								<input type="password" name="passwordval" class="form-control" id="passwordval">
							</div>
							<div class="form-group">
								<label for="propic">Ajouter une photo de profil :</label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">URL</span>
									<input type="text" name="propic" class="form-control" id="propic">
								</div>
							</div>
							<div class="form-group">
								<label for="activity"><span class="red">*</span> Secteur d'activité :</label>
								<input type="text" name="activity" class="form-control" id="activity">
							</div>
							<div class="form-group">
								<label for="activitypic">Ajouter une photo annexes :</label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">URL</span>
									<input type="text" name="activitypic" class="form-control" id="activitypic">
								</div>
							</div>
							<div class="form-group">
								<label for="resume">A propos de vous :</label>
								<input type="text" name="resume" class="form-control" id="resume">
							</div>
							<button type="submit" class="btn btn-default">S'enregistrer</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="connectModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Se connecter</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="POST" action="./function/user_connect.php">
							<div class="form-group">
								<label for="mail">Mail de l'utilisateur :</label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-globe"></span></span>
									<input type="text" name="mail" class="form-control" id="mail">
								</div>
							</div>
							<div class="form-group">
								<label for="password">Mot de passe :</label>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" name="password" class="form-control" id="password">
								</div>
							</div>
							<div class="checkbox">
								<label><input type="checkbox"> Se souvenir de moi</label>
							</div>
							<button type="submit" class="btn btn-default">Se connecter</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

