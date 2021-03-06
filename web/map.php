<?php
//(1) On inclut la classe de Google Maps pour générer ensuite la carte.
require('./class/GoogleMapAPIv3.class.php');

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
						<!--<li><a href="./around.php"><span class="glyphicon glyphicon-leaf"></span> Autour de vous</a></li>-->
					</ul>
					<form class="navbar-form navbar-left" role="search" method="POST" action="./function/user_search.php">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Rechercher un Agriculteur">
						</div>
						<button type="submit" class="btn btn-default">Rechercher</button>
					</form>
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
            <?php
            $map = new GoogleMapAPI();
            $map->setDivId('testmap');
            $map->setDirectionDivId('cat1');
            $adress = 'France, La loupe';
            $map->geocoding($adress);

            $map->setCenterLatLng($map->geocoding($adress)[2], $map->geocoding($adress)[3]);
            $map->setEnableWindowZoom(FALSE);
            $map->setEnableAutomaticCenterZoom(FALSE);
            $map->setDisplayDirectionFields(false);
            // $map->setClusterer(true);
            $map->setSize('100%','99%');
            $map->setZoom(14);
            $map->setLang('fr');
            $map->setDefaultHideMarker(false);
            $map->setMapType('HYBRID');
            $map->setIconSize(50,50);
            //$map->addDirection('nantes','paris');

            /************************ TABLEAU COORDONNEES CHAMPS DE BLE ******************/

            $wheatCoords = array();
            $wheatCoords []= array([48.471, 0.996399, '','<strong>test<br>test<br>test<br>tesd</strong>'],
                                [48.475, 0.996399, '', '<strong>test<br>test<br>test<br>tesd</strong>']);

            /********************************** FIN **************************************/

            $map->addArrayMarkerByCoords($wheatCoords[0],'wheat','../img/wheat.png');

            /*********************** TABLEAU COORDONNEES CHAMPS DE COLZA *****************/

            $colzaCoords = array();
            $colzaCoords []= array([48.470, 0.99398, '','<strong>test<br>test<br>test<br>tesd</strong>'],
                [48.465, 0.996399, '', '<strong>test<br>test<br>test<br>tesd</strong>']);

            /********************************* FIN **************************************/

            $map->addArrayMarkerByCoords($colzaCoords[0],'colza','../img/rapeflower.png');

            /*echo '<pre>';
            var_dump($wheatCoords[0]);die;*/
            $map->generate();
            echo $map->getGoogleMap();
            ?>
		</div>
		<div class="seedfoot col-md-12"></div>
		<div class="seedfoot1 col-md-12"></div>
		<div class="seedfoot2 col-md-12"></div>
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

