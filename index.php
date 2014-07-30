<?php get_header(); ?>

<?php if (is_home()) { ?>
<body>
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
