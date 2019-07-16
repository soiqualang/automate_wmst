<?php
$introdir="intro/intro.txt";
$myfile = fopen($introdir, "r") or die("Unable to open file!");
$intro=nl2br(fread($myfile,filesize($introdir)));
fclose($myfile);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Automate LST & NDVI</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/default.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.0-rc.2/leaflet.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.4.2/Control.FullScreen.min.css" />
	<link rel="stylesheet" href="Leaflet.TimeDimension/dist/leaflet.timedimension.control.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<style>
		.map1{
			width: 100%;
			height: 90vh;
		}
		.copyright{
			font-size: initial;
			margin-left: 20px;
		}
	</style>
</head>
<body>
	<h1>
		<?php echo $intro;?>		
	</h1>
	<div id="map" class="map1"></div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.0-rc.2/leaflet.js"></script>
	<script src="leaflet-hash.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.fullscreen/1.4.2/Control.FullScreen.min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/nezasa/iso8601-js-period/master/iso8601.min.js"></script>

	<!-- script type="text/javascript" src="Leaflet.TimeDimension/dist/leaflet.timedimension.min.js"></script -->
	<script type="text/javascript" src="Leaflet.TimeDimension/src/leaflet.timedimension.js"></script>
	<script type="text/javascript" src="Leaflet.TimeDimension/src/leaflet.timedimension.util.js"></script>
	<script type="text/javascript" src="Leaflet.TimeDimension/src/leaflet.timedimension.layer.js"></script>
	<script type="text/javascript" src="Leaflet.TimeDimension/src/leaflet.timedimension.layer.wms_2.js"></script>
	<script type="text/javascript" src="Leaflet.TimeDimension/src/leaflet.timedimension.player.js"></script>
	<script type="text/javascript" src="Leaflet.TimeDimension/src/leaflet.timedimension.control.js"></script>
	<script type="text/javascript" src="redrose.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
</body>
</html>
