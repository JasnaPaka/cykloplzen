<?php get_header(); ?>

<?php if (is_home()) { ?>
<body>
	<script type="text/javascript">
		function toggleSidebar() {
			var sidebar = document.getElementById("legenda");
			var buttonHide = document.getElementById("button-hide");
			
			var style = window.getComputedStyle(sidebar);
			var buttonStyle = window.getComputedStyle(buttonHide);
			
			if (style.getPropertyValue("display") == "block") {
				sidebar.style.display = "none";
				buttonHide.style.right = 0;
				buttonHide.title = "Zobrazí postranní lištu";
				buttonHide.firstChild.data= "<";
			} else {
				sidebar.style.display = "block";
				buttonHide.style.right = "280px";
				buttonHide.title = "Skryje postranní lištu";
				buttonHide.firstChild.data= ">";
			}
			
			L.Util.requestAnimFrame(map.invalidateSize, map, false, map._container);
		}
	</script>

	<button id="button-hide" title="Skryje postranní lištu" onclick="toggleSidebar()">&gt;</button>

	<div id="legenda">
		<img src="<?php bloginfo('template_url'); ?>/images/bicycle-icon.png" alt="Ikona kola" id="logo" />
	
		<h1>Cyklomapa Plzně</h1>
	
		<div id="legenda-obsah">
			<p>Komunitní cyklomapa Plzně a okolí, která vzniká v rámci podnětu 
				programu <a href="http://www.verejnyprostorvplzni.cz/pestuj-prostor">Pěstuj prostor</a> pod
				<a href="http://plzen2015.cz/">Plzeň 2015</a>.</p>
				
			<p>Staví na projektu <a href="http://www.openstreetmap.org/">OpenStreetMap</a> a využívá vzhledu,
			který vychází z <a href="http://mtbmap.cz/">MTBMap</a> a pro potřeby cyklistiky jej upravilo
			<a href="http://prahounakole.cz/">Prahou na kole</a>.</p>
			
			<h2>Jak se zapojit</h2>
			
			<p>Mapa vzniká díky práci dobrovolníků, mezi které se můžete zařadit i vy. Našli jste chybu?
			Chcete mapu něčím vylepšit? <a href="mailto:jasnapaka@jasnapaka.com">Napište nám</a> nebo
			si přečtěte, <a href="./mapovani/">jak pomoci s vylepšování mapy</a>.</p>
			
			<h2>Podpora</h2>
			
			<p>Děkujeme všem, kteří nás podporují. Jmenovitě pak Plzeň 2015, Prahou na kole a <a href="./partneri/">další partneři</a>.</p>
		</div>
	</div>

	<div id="map"></div>

	<script src="<?php bloginfo('template_url'); ?>/leaflet-0.7.3/leaflet.js"></script>
	<script>

		var map = L.map('map').setView([49.74403, 13.36958], 13);

		L.tileLayer(' http://tiles.prahounakole.cz/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Data &copy; Přispěvatelé <a href="http://openstreetmap.org">OpenStreetMap</a>, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Dlaždice © <a href="hhttp://mapa.prahounakole.cz/">Prahou na kole</a>'
		}).addTo(map);
	</script>
	
<?php } else { ?>

<body id="bodyContent">	
<div id="content">

<div id="menu">
	<strong><a href="<?php echo home_url(); ?>">Zpět na mapu</a></strong>
</div>

<?php
	while ( have_posts() ) : the_post();
		the_title('<h1>', '</h1>');	
		the_content();
	endwhile;
	
	edit_post_link('Upravit článek', '<p id="editContent">[<strong>', '</strong>]</p>');
?>

</div>	

<?php } ?>

<?php get_footer(); ?>
