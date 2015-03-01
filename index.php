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
			
			<p>Děkujeme všem, kteří nás podporují. Jmenovitě pak Plzeň 2015, Plzeň na kole, Prahou na kole a <a href="./podpora/">dalším podporovatelům</a>.</p>
			
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
			<h2>Legenda</h2>
			
			<table>
				<tr>
					<td width="53"><img src="images/legenda/cyklostojan.png" alt="Cyklostojan" /></td>
					<td>Cyklostojan</td>
				</tr>

				<tr>
					<td width="53"><img src="images/legenda/cyklotrasa.png" alt="Značená cyklotrasa" /></td>
					<td>Značená cyklotrasa</td>
				</tr>
				<tr>
					<td><img src="images/legenda/chodnik.png" alt="Chodník s cyklopruhem" /></td>
					<td>Chodník s cyklopruhem</td>
				</tr>
				<tr>
					<td><img src="images/legenda/silny-provoz.png" alt="Silný provoz" /></td>
					<td>Silný provoz</td>
				</tr>
				<tr>
					<td><img src="images/legenda/slaby-provoz.png" alt="Slabý provoz" /></td>
					<td>Slabý provoz</td>
				</tr>					
				<tr>
					<td><img src="images/legenda/zadny-provoz.png" alt="Žádný provoz" /></td>
					<td>Žádný provoz</td>
				</tr>
				<tr>
					<td><img src="images/legenda/horsi-povrch.png" alt="Horší povrch" /></td>
					<td>Horší povrch</td>
				</tr>					
				<tr>
					<td><img src="images/legenda/spatny-povrch.png" alt="Špatný povrch" /></td>
					<td>Špatný povrch</td>
				</tr>
				<tr>
					<td><img src="images/legenda/cykloobousmerka.png" alt="Zpřístupněná jednosměrka" /></td>
					<td>Zpřístupněná jednosměrka</td>
				</tr>
				<tr>
					<td><img src="images/legenda/dlazba.png" alt="Dlažba, kočičí hlavy" /></td>
					<td>Dlažba, kočičí hlavy</td>
				</tr>
				<tr>
					<td><img src="images/legenda/prejezd.png" alt="Přejezd pro cyklisty" /></td>
					<td>Přejezd pro cyklisty</td>
				</tr>
				<tr>
					<td><img src="images/legenda/retarder.png" alt="Zpomalovací prvek" /></td>
					<td>Zpomalovací prvek</td>
				</tr>
				<tr>
					<td><img src="images/legenda/zakaz-cyklo.png" alt="Zákaz vjezdu cyklistům" /></td>
					<td>Zákaz vjezdu cyklistům</td>
				</tr>
				<tr>
					<td><img src="images/legenda/pesi-zona.png" alt="Pěší zóna bez cyklistů" /></td>
					<td>Pěší zóna bez cyklistů</td>
				</tr>
				<tr>
					<td><img src="images/legenda/pesi-zona-cyklo.png" alt="Zóna pro pěší a cyklisty" /></td>
					<td>Zóna pro pěší a cyklisty</td>
				</tr>
				<tr>
					<td><img src="images/legenda/chodnik-neznaceny.png" alt="Chodník, cesta pro pěší" /></td>
					<td>Chodník, cesta pro pěší</td>
				</tr>					
				<tr>
					<td><img src="images/legenda/dopravni-obsluha.png" alt="Vjezd jen pro dopravní obsluhu" /></td>
					<td>Vjezd jen pro dopravní obsluhu</td>
				</tr>
				
				<tr>
					<td><img src="images/legenda/stoupani.png" alt="Stoupání" /></td>
					<td>Stoupání</td>
				</tr>
				<tr>
					<td><img src="images/legenda/strme-stoupani.png" alt="Strmé stoupání" /></td>
					<td>Strmé stoupání</td>
				</tr>
				<tr>
					<td><img src="images/legenda/piktokoridor.png" alt="Piktokoridor" /></td>
					<td>Piktokoridor</td>
				</tr>
				
				
			</table>
		</div>
	</div>
</div>

<div id="map"></div>

<script src="leaflet-0.7.3/leaflet.js"></script>
<script src="leaflet-plugins-1.2.1/control/Permalink.js"></script>
<script src="leaflet-plugins-1.2.1/control/Permalink.Marker.js"></script>
<script src="leaflet-plugins-1.2.1/control/Permalink.Layer.js"></script>
<script src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
<script src="leaflet-plugins-1.2.1/layer/tile/Google.js"></script>	


<script>
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

</body>
</html>
