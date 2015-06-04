<?php
//(1) On inclut la classe de Google Maps pour générer ensuite la carte.
require('./class/GoogleMapAPI.class.php');

//(2) On crée une nouvelle carte; Ici, notre carte sera $map.
$map = new GoogleMapAPI('map');

//(3) On ajoute la clef de Google Maps.
$map->setAPIKey('AIzaSyCp6TXe102Zh_U9cZFUSbctFUIOsg24L9E');

//(4) On ajoute les caractéristiques que l'on désire à notre carte.
$map->setWidth("1400");
$map->setHeight("850");
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
    <meta charset="utf-8">
    <title>SeedAroundMap</title>
    <?php $map->printHeaderJS(); ?>
    <?php $map->printMapJS(); ?>
</head>

<body onload="onLoad();">
<?php $map->printMap(); ?>
<?php  ?>

</body>

</html>