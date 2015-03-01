<?php

class POIReader {

	var $FEEDS = array(
		"Problematická místa" => "http://plzen.dopracenakole.net/kml/p/",
		"Cykloopatření" => "http://plzen.dopracenakole.net/kml/c/",
		"Fotografie tras" => "http://plzen.dopracenakole.net/kml/f/",
		"Další informace v mapě" => "http://plzen.dopracenakole.net/kml/e/"
	);
	
	public function getCategories() {
		$categories = array();
		
		foreach (array_keys($this->FEEDS) as $value) {
			array_push($categories, $value);
		}
		
		return $categories;
	}
		
	public function getPOIContent() {
		$pois = "";
		
		foreach ($this->FEEDS as $feed => $value) {
			$xml = simplexml_load_file($value);
			
			$childs = $xml->Document->children();
			foreach ($childs as $child) {
				$name = $child->name;
				$minZoom = $child->minZoom;
				$ikona = $child->ikona;
				$coordinates = explode(",", $child->Point->coordinates);
				
				if (strlen($pois) > 0) {
					$pois.= ",";
				}
				
				$pois.= "['".$feed."', '".$name."',".$minZoom.",'".$ikona."',".$coordinates[1].",".$coordinates[0].",".$child["id"]."]";
			}
			
		}
		
		return "[".$pois."]";
	}

}

?>