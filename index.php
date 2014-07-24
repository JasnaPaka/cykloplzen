<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Komunitní cyklomapa Plzně a okolí" />
	<meta name="keywords" content="cyklo,kolo,mapa,cyklistika" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>Cyklomapa Plzně a okolí</title>

	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./leaflet-0.7.3/leaflet.css" />
</head>
<body>
	<div id="map"></div>

	<script src="./leaflet-0.7.3/leaflet.js"></script>
	<script>

		var map = L.map('map').setView([49.74403, 13.36958], 13);

		L.tileLayer(' http://tiles.prahounakole.cz/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Data &copy; Přispěvatelé <a href="http://openstreetmap.org">OpenStreetMap</a>, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Dlaždice © <a href="hhttp://mapa.prahounakole.cz/">Prahou na kole</a>'
		}).addTo(map);
	</script>
</body>
</html>
