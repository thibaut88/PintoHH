<?php
require '../config.php';
require 'header.php';

$id_user= 1;
$page_favoris=true;

include 'template_bieres.php';
include 'footer.php';
?>



<script type="text/javascript">
 //script qui gère les favoris 
 //ajax
	$(function(){

	//ON RECUPERE LES INPUT CHECKBOX COCHES
		var $favoris = $(':checkbox');
		$favoris.each(function(){
		// var $elem=  $(this);
		// var $is_chech = $elem.attr('checked');
		});
		
	//SI INPUT CHANGE ALORS FAIRE REQUETE AJAX
	$favoris.change(function(){
		var $biere = $(this);
		var $biere_id = $biere.attr('id').replace('favoris','');
		var $id_user = 1;
		var $datas = 'id_biere='+$biere_id+'&id_user='+$id_user;
		
		$.ajax({
			url:'../scripts/remove_biere_favoris.php',
			type:'GET',
			data:$datas,
			dataType: 'html',
			success:function(resultat){
				//ON AVERTI USER QUE SON BAR EST SUPPRIMER DES FAVORIS
				$('.container').prepend(resultat);
				//RECHARGEMENT DE LA PAGE 
				setInterval(function(){location.reload(); }, 3000);		} 
		}); //ajax
		
	});
	//change
	 
 }); //Jquery


</script>

