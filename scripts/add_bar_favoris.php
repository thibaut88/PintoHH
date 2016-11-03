<?php

require '../config.php';

if(!empty($_GET['id_user']) && !empty($_GET['id_bar'])){
	
	$id_user = (int) $_GET['id_user'];
	$id_bar = (int)$_GET['id_bar'];
	
	$sql = "INSERT INTO bar_favori 
	( bars_id_bar, utilisateurs_id_utilisateur )
	VALUES ( $id_bar, $id_user)";
	
	if($bdd->query($sql)==true){
		$rep = "<p>bar ajouté aux favoris</p>";
	}else{

		$rep ="<p class='erreur'>erreur</p>";
	}
	
	
}
else{
		$rep ="<p class='erreur'>erreur</p>";
}

	echo $rep;

?>