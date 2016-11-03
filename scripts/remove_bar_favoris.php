<?php

require '../config.php';

if(!empty($_GET['id_user']) && !empty($_GET['id_bar'])){
	
	$id_user = (int) $_GET['id_user'];
	$id_bar = (int)$_GET['id_bar'];
	
	$sql ="DELETE FROM bar_favori WHERE bars_id_bar = $id_bar AND utilisateurs_id_utilisateur = $id_user";
	
	if($bdd->query($sql)==true){
		$rep = "<p>bar supprimé des favoris</p>";
	}else{

		$rep ="<p class='erreur'>erreur</p>";
	}
	
	
}
else{
		$rep ="<p class='erreur'>erreur</p>";
}

	echo $rep;

?>