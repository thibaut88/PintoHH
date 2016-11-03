<?php
	require '../config.php';
	include 'header.php';

	//OBJET GEOLOCALISATION
	require '../scripts/geolocalisation.php';

	//RECUPERE long && lat FROM bars.
	$sql = "SELECT * FROM bars ORDER BY longitude ASC";
	$rep=$bdd->query($sql);
	?>
	<div class='container'>
	<div class='row'>
		
	<?php	
	//DATAS BARS
	$coords = array();
	
	while ( $row = $rep->fetch()){ 

	$BarDatas = array("lat" =>$row['latitude'], "long" =>  $row['longitude']); // Bar (France)

	$geo = new geolocalisationClass($PositionDuClient,$BarDatas);
	
	
 $distance = $geo->get_distance_between_points($PositionDuClient['lat'], $PositionDuClient['long'], $BarDatas['lat'], $BarDatas['long']);
   
   $metres = null;
  
  foreach ($distance as $unit => $value) {
	  $metres =  number_format($value,4);
	  $metres = (string) $metres;
	  $metres =  explode('.',$metres);
	  $metres = $metres[0];
  }

  
	$coords[] = array(
	'id_bar' =>$row['id_bar'],
	'longitude' =>$row['longitude'],
	'latitude' =>$row['latitude'],
	'distance' =>$metres
	);
	

	?>
		
	<ul class="collapsible popout " data-collapsible="accordion">
    <li class="black-text"> 
      <div class="collapsible-header">
	<h4><?=$row['nom_bar']?></h4>
	  </div>
      <div class="collapsible-body">
	  <p>id bar<?=$row['id_bar']?></p>
	  <p>longitude<?=$row['longitude']?></p>
	  <p>latitude<?=$row['latitude']?></p>
	  <p>distance :<?=$metres?> metres</p>
	 </div>
	
    </li>
  </ul>
        

<?php
	}

		$triByDistance = array();
		$i=0;
		for ($i;$i<count($coords);$i++){
			foreach ($coords[$i] as $key=>$value){
				if($key=='distance'){
				// echo $value.'<br>';
				$triByDistance[][$value] = 'identifiant_bar';
			
				}
					
			}
			}
			
	ksort($triByDistance);
	
	$premier_bar = min($triByDistance);
	
	// var_dump($coords);
	// var_dump($triByDistance);
	// var_dump($premier_bar);

	// $sql = "SELECT * FROM bars WHERE id_bar = $premier_bar ";
	
	
	
?>
	</div>
	</div>
	
<?php
include 'footer.php';