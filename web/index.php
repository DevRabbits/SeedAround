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
		<title>SeedArround - Accueil</title>
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
		<div class="caroudiv col-md-10 col-md-offset-1">
			<div style="width:100%;position:absolute;left:0%;" id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="../img/slide1.jpg" alt="slide1">
						<div class="carousel-caption">
						  <h3>Votre interface personnalisée !</h3>
							<p>Découvrez une nouvelle façoon de présenter et gérer votre production.</p>
						</div>
					</div>
					<div class="item">
						<img src="../img/slide2.jpg" alt="slide2">
						<div class="carousel-caption">
						  <h3>Un site pour tous !</h3>
							<p>Partagez vos connaissances avec la communautée.</p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Précédent</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Suivant</span>
				</a>
			</div>
		</div>
		<div class="main1 mainpres col-md-4 col-md-offset-1">
			<img src="../img/stat.jpg">
		</div>
		<div class="main2 col-md-6"></div>
		<div class="main3 col-md-10 col-md-offset-1"></div>
		<div class="main4 col-md-6 col-md-offset-1"></div>
		<div class="main5 mainpres col-md-4">
			<img src="../img/share.jpg">
		</div>
		<div class="main3 col-md-10 col-md-offset-1"></div>
		<div class="main6 col-md-10 col-md-offset-1">
			<p><strong>Nos derniers inscrits :</strong></p>
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
								<div class="form-group">
									<select class="form-control" name="activity" id="activity">
										<option>Agroalimentaire</option>
										<option>Aquaculture</option>
										<option>Animal</option>
										<option>Sylviculture</option>
										<option>Viticulture</option>
										<option>Arboriculture</option>
										<option>Horticulture</option>
										<option>Autre</option>
									</select>
								</div>
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
