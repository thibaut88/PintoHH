<?php

require '../config.php';

if(!empty($_GET['id_user']) && !empty($_GET['id_biere'])){
	
	$id_user = (int) $_GET['id_user'];
	$id_biere = (int)$_GET['id_biere'];
	
	$sql ="DELETE FROM biere_favori WHERE bieres_id_biere = $id_biere AND utilisateurs_id_utilisateur = $id_user";
	
	if($bdd->query($sql)==true){
		$rep = "<p>bière supprimé des favoris</p>";
	}else{

		$rep ="<p class='erreur'>erreur</p>";
	}
	
	
}
else{
		$rep ="<p class='erreur'>erreur</p>";
}

	echo $rep;

?>