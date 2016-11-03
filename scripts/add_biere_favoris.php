<?php

require '../config.php';

if(!empty($_GET['id_user']) && !empty($_GET['id_biere'])){
	
	$id_user = (int) $_GET['id_user'];
	$id_biere = (int)$_GET['id_biere'];
	
	$sql = "INSERT INTO biere_favori 
	( bieres_id_biere, utilisateurs_id_utilisateur )
	VALUES ( $id_biere, $id_user)";
	
	if($bdd->query($sql)==true){
		$rep = "<p>bière ajoutée aux favoris</p>";
	}else{

		$rep ="<p class='erreur'>erreur</p>";
	}
	
	
}
else{
		$rep ="<p class='erreur'>erreur</p>";
}

	echo $rep;

?>