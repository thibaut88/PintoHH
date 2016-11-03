<?php
 include("../config.php");
 include("header.php"); 
 
 $controlFavorisChecked=true;

 ?>


    <div class="container2">

        <h2 class="center-align">Rechercher une bière</h2>

        <div class="row">

            <form method="post" action="#">
                <div class="input-field col l2 s6">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom">
                </div>


                <div class="input-field col l2 s6">
                    <select name="Distance" id="Distance">
                        <option>500M</option>
                        <option>1 Km</option>
                        <option>5 Km</option>
                        <option>Pas de palier</option>
                    </select>
                    <label for="Distance">Palier de distance</label>
                </div>

                <div class="input-field col l2 s6">
                    <select name="Degre" id="Degre">
                        <option>Sans alcool</option>
                        <option>4 %</option>
                        <option>7 %</option>
                        <option>10 %</option>
                    </select>
                    <label for="Degre"> Degré d'alcool </label>
                </div>

                <div class="input-field col l2 s6">
                    <select name="Type" id="Type">
                        <option>Brune</option>
                        <option>Blonde</option>
                        <option>Blanche</option>
                        <option>Ambrée</option>
                        <option>Aromatisée</option>
                    </select>
                    <label for="Type">Type de bière</label>
                </div>

                <div class="input-field col l2 s6">
                    <select name="Provenance" id="Provenance">
                        <option>France</option>
                        <option>Belgique</option>
                        <option>Allemagne</option>
                    </select>
                    <label for="Provenance">Provenance</label>
                </div>

                <div class="input-field col l2 s6">
                    <select name="happy" id="Restriction">
                        <option>Pas de restriction</option>
                        <option>Dans la journée</option>
                        <option>Dans une heure</option>
                        <option>En ce moment</option>
                    </select>
                    <label for="Restriction">Happy Hour</label>
                </div>

                <div class="input-field col l1 s6 offset-l10 offset-s3">
                    <a class="waves-effect waves-light btn" type="submit" name="action">Rechercher</a>
                </div>

            </form>
        </div>

    
		
    </div>
	
	    <!-- résultats de la recherche en liste" -->
		
			<?php include('template_bieres.php');
			
			?>
			
			<script type="text/javascript">
		$(function(){
			var $boutonFavoris = $(":checkbox");
			$boutonFavoris.change(function(){
				var $biere = $(this);
				var $id_biere = $biere.attr('id').replace('favoris','');
				var $id_user = 1;
				var $datas = 'id_biere='+$id_biere+'&id_user='+$id_user;
		
				var $ischecked = $(this).attr('checked');
				var $controllActionFavoris;
				if($ischecked==undefined){
					$controllActionFavoris="ajouter";
				}
				if($ischecked=='checked'){
					$controllActionFavoris="supprimer";
				}
				console.log($controllActionFavoris);
				var $url;
				var $datas;
				//URL
				if($controllActionFavoris=="ajouter"){
					var $url ="../scripts/add_biere_favoris.php";
				}
				if($controllActionFavoris=="supprimer"){
					var $url ="../scripts/remove_biere_favoris.php";
				}
		
		//AJAX 
		$.ajax({
			url:$url,
			type:'GET',
			data:$datas,
			dataType: 'html',
			success:function(resultat){
				// ON AVERTI USER QUE SON BAR EST SUPPRIMER DES FAVORIS
				$('.container').prepend(resultat);
				// RECHARGEMENT DE LA PAGE 
				setInterval(function(){location.reload(); }, 3000);
				

			
		} 
		}); //AJAX		
		});//CHANGE 
		}); //JQUERY
		
		</script>
		
		
		

<?php include("footer.php"); ?>