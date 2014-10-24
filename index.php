<?php get_header(); ?>

<?php if (is_home()) { ?>
<body>
	<script type="text/javascript">
		function toggleSidebar() {
			var sidebar = document.getElementById("sidebar");
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
		
		function toggleLegenda() {
			var legenda = document.getElementById("sidebar-legenda");
			var obsah = document.getElementById("sidebar-info");
			var style = window.getComputedStyle(legenda);
			
			var infoButton = document.getElementById("menu-o-mape");
			var legendaButton = document.getElementById("menu-legenda");
			
			if (style.getPropertyValue("display") == "none") {
				legenda.style.display = "block";
				obsah.style.display = "none";
				
				infoButton.style.display = "block";
				legendaButton.style.display = "none";
			} else {
				legenda.style.display = "none";
				obsah.style.display = "block";
				
				infoButton.style.display = "none";
				legendaButton.style.display = "block";
			}
		}
	</script>

	<button id="button-hide" title="Skryje postranní lištu" onclick="toggleSidebar()">&gt;</button>

	<div id="sidebar">
		<img src="<?php bloginfo('template_url'); ?>/images/bicycle-icon.png" alt="Ikona kola" class="logo" />
	
		<h1>Cyklomapa Plzně</h1>
	
		<div id="sidebar-obsah">
			<p>Komunitní cyklomapa Plzně a okolí, která vzniká v rámci podnětu 
				programu <a href="http://www.verejnyprostorvplzni.cz/pestuj-prostor">Pěstuj prostor</a> pod
				<a href="http://plzen2015.cz/">Plzeň 2015</a>.</p>
				
			<p>Staví na projektu <a href="http://www.openstreetmap.org/">OpenStreetMap</a> a využívá vzhledu,
			který vychází z <a href="http://mtbmap.cz/">MTBMap</a> a pro potřeby cyklistiky jej upravilo
			<a href="http://prahounakole.cz/">Prahou na kole</a>.</p>
			
			<p id="sidebar-menu">
				<a href="#" style="display:none" id="menu-o-mape" onclick="toggleLegenda()">O mapě</a> 
				<a href="#" id="menu-legenda" onclick="toggleLegenda()">Legenda mapy</a>
			</p>
			
			<div id="sidebar-info">
				<h2>Jak se zapojit</h2>
				
				<p>Mapa vzniká díky práci dobrovolníků, mezi které se můžete zařadit i vy. Našli jste chybu?
				Chcete mapu něčím vylepšit? <a href="./o-mape/">Napište nám</a> nebo
				si přečtěte, <a href="./mapovani/">jak pomoci s vylepšováním mapy</a>.</p>
				
				<h2>Podpora</h2>
				
				<p><a href="http://plzen2015.cz/">
					<img src="<?php bloginfo('template_url'); ?>/images/plzen2015.png" alt="Logo Plzeň 2015" class="logo" />
				</a></p>
				
				<p><a href="http://verejnyprostorvplzni.cz/pestuj-prostor">
					<img src="<?php bloginfo('template_url'); ?>/images/pestuj-prostor.png" alt="Logo Pěstuj prostor" class="logo" />
				</a></p>
				
				<p><a href="http://www.plzennakole.cz/">
					<img src="<?php bloginfo('template_url'); ?>/images/plzen-na-kole.png" alt="Logo Plzeň na kole" class="logo" />
				</a></p>
				
				<p>Děkujeme všem, kteří nás podporují. Jmenovitě pak Plzeň 2015, Plzeň na kole, Prahou na kole a <a href="./podpora/">dalším podporovatelům</a>.</p>			
				
				<h2>Kontakt</h2>
				
				<p>Pokud se vám projekt líbí, chcete k němu něco sdělit nebo jej podpořit, <a href="./o-mape/">napište nám</a>.</p>
			</div>
			
			<div id="sidebar-legenda" style="display:none">
				<h2>Legenda</h2>
				
				<table>
					<tr>
						<td width="53"><img src="<?php bloginfo('template_url'); ?>/images/legenda/cyklostojan.png" alt="Cyklostojan" /></td>
						<td>Cyklostojan</td>
					</tr>

					<tr>
						<td width="53"><img src="<?php bloginfo('template_url'); ?>/images/legenda/cyklotrasa.png" alt="Značená cyklotrasa" /></td>
						<td>Značená cyklotrasa</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/chodnik.png" alt="Chodník s cyklopruhem" /></td>
						<td>Chodník s cyklopruhem</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/silny-provoz.png" alt="Silný provoz" /></td>
						<td>Silný provoz</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/slaby-provoz.png" alt="Slabý provoz" /></td>
						<td>Slabý provoz</td>
					</tr>					
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/zadny-provoz.png" alt="Žádný provoz" /></td>
						<td>Žádný provoz</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/horsi-povrch.png" alt="Horší povrch" /></td>
						<td>Horší povrch</td>
					</tr>					
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/spatny-povrch.png" alt="Špatný povrch" /></td>
						<td>Špatný povrch</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/cykloobousmerka.png" alt="Zpřístupněná jednosměrka" /></td>
						<td>Zpřístupněná jednosměrka</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/dlazba.png" alt="Dlažba, kočičí hlavy" /></td>
						<td>Dlažba, kočičí hlavy</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/prejezd.png" alt="Přejezd pro cyklisty" /></td>
						<td>Přejezd pro cyklisty</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/retarder.png" alt="Zpomalovací prvek" /></td>
						<td>Zpomalovací prvek</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/zakaz-cyklo.png" alt="Zákaz vjezdu cyklistům" /></td>
						<td>Zákaz vjezdu cyklistům</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/pesi-zona.png" alt="Pěší zóna bez cyklistů" /></td>
						<td>Pěší zóna bez cyklistů</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/pesi-zona-cyklo.png" alt="Zóna pro pěší a cyklisty" /></td>
						<td>Zóna pro pěší a cyklisty</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/chodnik-neznaceny.png" alt="Chodník, cesta pro pěší" /></td>
						<td>Chodník, cesta pro pěší</td>
					</tr>					
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/dopravni-obsluha.png" alt="Vjezd jen pro dopravní obsluhu" /></td>
						<td>Vjezd jen pro dopravní obsluhu</td>
					</tr>
					
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/stoupani.png" alt="Stoupání" /></td>
						<td>Stoupání</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/strme-stoupani.png" alt="Strmé stoupání" /></td>
						<td>Strmé stoupání</td>
					</tr>
					<tr>
						<td><img src="<?php bloginfo('template_url'); ?>/images/legenda/piktokoridor.png" alt="Piktokoridor" /></td>
						<td>Piktokoridor</td>
					</tr>
					
					
				</table>
			</div>
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
		
		L.control.scale({imperial: false, maxWidth: 250}).addTo(map);
	</script>
	
<?php } else { ?>

<body id="bodyContent">	
<div id="content">

<div id="menu">
	<a href="<?php echo home_url(); ?>/" title="Zobrazení mapy" class="menu-item">Mapa</a>
	<a href="<?php echo home_url(); ?>/mapovani/" title="Jak pomoci s vylepšováním mapy" class="menu-item">Vylepšování mapy</a>
	<a href="<?php echo home_url(); ?>/podpora/" title="Kdo podpořil mapu" class="menu-item">Kdo podpořil</a>
	<a href="<?php echo home_url(); ?>/o-mape/" title="O mapě" class="menu-item">O mapě</a>
</div>

<?php
	while ( have_posts() ) : the_post();
		the_title('<h1 id="nadpis">', '</h1>');	
		the_content();
	endwhile;
	
	edit_post_link('Upravit článek', '<p id="editContent">[<strong>', '</strong>]</p>');
?>

</div>	

<?php } ?>

<?php get_footer(); ?>
