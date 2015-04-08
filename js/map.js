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
		
		var gglLayer = new L.Google();	
		
		L.control.scale({imperial: false, maxWidth: 250}).addTo(this.map);
		
		var layers = new L.Control.Layers({'Cyklomapa':pnkLayer, "OpenCycleMap":openCycleMapLayer, "Letecká Google": gglLayer});
		
		this.map.addControl(layers);
		this.map.addControl(new L.Control.Permalink({text: 'Trvalý odkaz', layers: layers}));
		
		// POIs
		this.markers = [];
		currentZoom = this.map.getZoom();
		
		for (i = 0; i < POIs.length; ++i) {
			var icon = L.icon({iconUrl: POIs[i][3], iconSize: [20, 20]});
			
			var marker = L.marker([POIs[i][4], POIs[i][5]], {icon: icon});
			marker.addTo(this.map).bindPopup("<strong>" + POIs[i][1] + "</strong>");
			marker.zoom = POIs[i][2];
			marker.category = POIs[i][0];
			marker.popupId = POIs[i][6];
			
			if (marker.zoom > currentZoom) {
				this.map.removeLayer(marker);
			} 
			
			this.markers.push(marker);
		}
		
		// zoom change
		this.map.on('zoomend', function(event) {
			cyclemap.changePOIs();
		});
		
		// načtení obsahu pop-upu
		this.map.on('popupopen', function(e) {
  			var marker = e.popup._source;
  			
  			url = "http://plzen.dopracenakole.net/popup/" + marker.popupId + "/";			
  			
			$.get(url, function(data) {
				  console.log( "success" );
				  console.log(data);
				})
				  .done(function() {
				    console.log( "second success" );
				  })
				  .fail(function() {
				    console.log( "error" );
				  })
				  .always(function() {
				    console.log( "finished" );
				  });
  
		});
		
	},
	
	changePOIs: function() {
		currentZoom = cyclemap.map.getZoom();
		
		categoriesElem = document.getElementsByName("category");

	    for (i = 0; i < cyclemap.markers.length; ++i) {
	    	zaskrtnuto = true;
	    	
	    	for (j = 0; j < categoriesElem.length; ++j) {
	    		cat = categoriesElem[j].getAttribute("data-category");;
	    		
	    		if (cat == cyclemap.markers[i].category && !categoriesElem[j].checked) {
	    			zaskrtnuto = false;
	    		}
	    	}
	    
	    	if (cyclemap.markers[i].zoom > currentZoom || !zaskrtnuto) {
	    		cyclemap.map.removeLayer(cyclemap.markers[i]);
			} else {
				cyclemap.markers[i].addTo(cyclemap.map);
			} 
	    }	
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