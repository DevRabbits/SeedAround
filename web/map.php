<?php
//(1) On inclut la classe de Google Maps pour générer ensuite la carte.
require('./class/GoogleMapAPI.class.php');

//(2) On crée une nouvelle carte; Ici, notre carte sera $map.
$map = new GoogleMapAPI('map');

//(3) On ajoute la clef de Google Maps.
$map->setAPIKey('AIzaSyCp6TXe102Zh_U9cZFUSbctFUIOsg24L9E');

//(4) On ajoute les caractéristiques que l'on désire à notre carte.
$map->setWidth("800px");
$map->setHeight("500px");
$map->setCenterCoords ('1.0143050000000358', '48.471285');
$map->setZoomLevel (11);


//(5) On applique la base XHTML avec les fonctions à appliquer ainsi que le onload du body.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
    <title>Ma première carte Google Maps</title>
    <?php $map->printHeaderJS(); ?>
    <?php $map->printMapJS(); ?>
</head>

<body onload="onLoad();">
<?php $map->printMap(); ?>
$map->addMarkerIcon( "<lien vers l'image du pointeur>", "<lien vers l'image de l'ombre du pointeur>", <décalage sur X de limage>, <décalage sur Y de limage>, <décalage sur X de la bulle dinformations>, <décalage sur Y de la bulle dinformations>);
</body>

</html>