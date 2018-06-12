var cyclemap = {
	map: null,
	markers: null,
	
	init: function(POIs) {
		this.map = L.map('map').setView([49.74403, 13.36958], 13);
		this.map.attributionControl.setPrefix("");
	
		var pnkLayer = L.tileLayer(' http://tiles.prahounakole.cz/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Data &copy; Přispěvatelé <a href="http://openstreetmap.org">OpenStreetMap</a>, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Dlaždice © <a href="http://mapa.prahounakole.cz/">Prahou na kole</a>'
		});
		this.map.addLayer(pnkLayer);
		
		var openCycleMapLayer = L.tileLayer(' http://{s}.tile.thunderforest.com/cycle/{z}/{x}/{y}.png', {
			maxZoom: 16,
			attribution: 'Data &copy; Přispěvatelé <a href="http://openstreetmap.org">OpenStreetMap</a>, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Dlaždice © <a href="http://opencyclemap.org/">OpenCycleMap.org</a>'
		});

		
		L.control.scale({imperial: false, maxWidth: 250}).addTo(this.map);
		
		var layers = new L.Control.Layers({'Cyklomapa':pnkLayer, "OpenCycleMap":openCycleMapLayer});
		
		this.map.addControl(layers);
		this.map.addControl(new L.Control.Permalink({text: 'Trvalý odkaz', layers: layers}));
		
		// zoom change
		this.map.on('zoomend', function(event) {

		});
		
	},
	
	categoryClick: function() {
		cyclemap.changePOIs();
	},
	
	toggleSidebar: function() {
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
		
		L.Util.requestAnimFrame(this.map.invalidateSize, this.map, false, this.map._container);
	},
	
	toggleLegenda: function() {
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
	
};