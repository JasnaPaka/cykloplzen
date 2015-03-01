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