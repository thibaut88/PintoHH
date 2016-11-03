<?php
session_start();
include("../config.php");
include("header.php"); 

 //GERE LS PARAMETRES POUR LE TEMPLATE 
$nom_bar = isset($_GET['nom_bar']) ? $_GET['nom_bar'] : '';
$style_bar = isset($_GET['style_bar']) && $_GET['style_bar']!=='' ? $_GET['style_bar'] : null;

$id_user = 1;
$page_favoris=true;

?>
<!-- REQUIRE TEMPLATE POUR L'AFFICHAGE DES BARS FAVORIS -->
<!-- INCLUS REQUETE + TEMPLATE -->
 <?php include("template_bars.php"); ?>
 
 <script type="text/javascript">
 //script qui gère les favoris 
 //ajax

 
 $(document).ready(function(){

	//ON RECUPERE LES INPUT CHECKBOX COCHES
		var $favoris =  $(':checked');
		$favoris.each(function(){
		var $elem=  $(this);
		var $is_chech = $elem.attr('checked');
		});
	 
	 //SI INPUT CHANGE ALORS FAIRE REQUETE AJAX
	$favoris.change(function(){
		var $bar = $(this);
		var $bar_id = $bar.attr('id').replace('favoris','');
		var $id_user = 1;
		var $datas = 'id_bar='+$bar_id+'&id_user='+$id_user;
		
		
		console.log($bar_id);
		console.log($id_user);

		$.ajax({
			url:'../scripts/remove_bar_favoris.php',
			type:'GET',
			data:$datas,
			dataType: 'html',
			success:function(resultat){
				//ON AVERTI USER QUE SON BAR EST SUPPRIMER DES FAVORIS
				$('.container').prepend(resultat);
				//RECHARGEMENT DE LA PAGE 
				setInterval(function(){location.reload(); }, 3000);

			
		} 
		} 
		); //ajax
		
	}); //change
	 
 }); //Jquery

 </script>
 
 
<?php include("footer.php"); ?>