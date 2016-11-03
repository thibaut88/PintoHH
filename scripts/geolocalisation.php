<?php

class geolocalisationClass{
	
	//latitude longitude client & bar
	public $geoClient = array();
	public $geoBar = array();
	//distances 
	public $distanceKm = null;
	public $distanceMetre = null;
	
	
	function __construct($client,$bar){
		$this->geoClient = $client;
		$this->geoBar = $bar;
	}//constructeur
	
	public function get_distance_between_points($latitude1, $longitude1, $latitude2, $longitude2) {
  	$theta = $longitude1 - $longitude2;
   	$miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
   	$miles = acos($miles);
 	$miles = rad2deg($miles);
  	$miles = $miles * 60 * 1.1515;
   	$feet = $miles * 5280;
  	$yards = $feet / 3;
   	$kilometers = $miles * 1.609344;
	$meters = $kilometers * 1000;
	$this->distanceKm=$kilometers;
	$this->distanceMetre=$meters;
  	// return compact('miles','feet','yards','kilometers','meters'); 
  	return compact('meters'); 
  }

}//OBJET DE  GEOLOCALISATION

//RECUPERE latitude longitude DU CLIENT
$geoIP = json_decode(file_get_contents("http://freegeoip.net/json/"), true);
//varialbles
$PositionDuClient = array("lat" => $geoIP['latitude'], "long" => $geoIP['longitude']); // Epinal (France)

?>