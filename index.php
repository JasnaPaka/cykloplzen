<?php
	include_once "poi.php";
	$poiReader = new POIReader();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Komunitní cyklomapa Plzně a okolí. Přehled oficiálních i neoficiálních cyklostezek a cyklotras." />
	<meta name="keywords" content="cyklostezky,cyklotrasy,plzeň,cyklo,kolo,mapa,cyklistika" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta property="og:image" content="images/bicycle-icon.png" />
	
	<title>Cyklomapa Plzně a okolí - přehled cyklotras a cyklostezek</title>
	
	<link rel="stylesheet" media="(max-width: 500px)" href="style-500.css" />
	
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="leaflet-0.7.3/leaflet.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	
	<script type='text/javascript' src='js/jquery-1.11.2.min.js'></script>
	
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body>

<script src="js/map.js"></script>

<button id="button-hide" title="Skryje postranní lištu" onclick="cyclemap.toggleSidebar()">&gt;</button>

<div id="sidebar">
	<img src="images/bicycle-icon.png" alt="Ikona kola" class="logo" />

	<h1>Cyklomapa Plzně</h1>

	<div id="sidebar-obsah">
		<p>Cyklomapa Plzně a okolí s přehledem oficiálních i neoficiálních cyklostezek a cyklotras.
		<a href="http://cyklomapainfo.plzne.cz/o-projektu/">Více o mapě</a>
		</p>
		
		<p>Jedná se o komunitní projekt, do kterého se <a href="http://cyklomapainfo.plzne.cz/jak-se-zapojit/">
		můžete zapojit i vy</a>!</p>
		
		<p id="sidebar-menu">
			<a href="#" style="display:none" id="menu-o-mape" onclick="cyclemap.toggleLegenda()">O mapě</a> 
			<a href="#" id="menu-legenda" onclick="cyclemap.toggleLegenda()">Legenda mapy</a>
		</p>
		
		<div id="sidebar-info">
			
			<h2>Podpora</h2>
			
			<p>Děkujeme všem, kteří nás podporují. Jmenovitě pak Plzeň 2015, Plzeň na kole, Prahou na kole a 
				<a href="http://cyklomapainfo.plzne.cz/o-projektu/">dalším podporovatelům</a>.</p>
			
			<p><br /><a href="http://plzen2015.cz/">
				<img src="images/plzen2015.png" alt="Logo Plzeň 2015" class="logo" />
			</a></p>
			
			<p><a href="http://pestujprostor.plzne.cz/">
				<img src="images/pestuj-prostor.png" alt="Logo Pěstuj prostor" class="logo" />
			</a></p>
			
			<p><a href="http://www.plzennakole.cz/">
				<img src="images/plzen-na-kole.png" alt="Logo Plzeň na kole" class="logo" />
			</a></p>
			
		</div>
		
		<div id="sidebar-legenda" style="display:none">
			<?php include_once "legenda.php" ?>
		</div>
	</div>
</div>

<div id="map"></div>

<script src="leaflet-0.7.3/leaflet.js"></script>
<script src="leaflet-plugins-1.2.1/control/Permalink.js"></script>
<script src="leaflet-plugins-1.2.1/control/Permalink.Marker.js"></script>
<script src="leaflet-plugins-1.2.1/control/Permalink.Layer.js"></script>
<script src="leaflet-plugins-1.2.1/layer/vector/KML.js"></script>


<script type="text/javascript">
	cyclemap.init();
</script>	

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54491086-1', 'auto');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
    cyclemap.toggleSidebar();
</script>


</body>
</html>
