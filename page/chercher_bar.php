<?php include("../config.php"); ?>
<?php include("header.php"); ?>

<?php
//INPUTS VALUES 
$nom_bar = isset($_GET['nom_bar']) ? $_GET['nom_bar'] : '';
$style_bar = isset($_GET['style_bar']) && $_GET['style_bar']!=='' ? $_GET['style_bar'] : null;
$controlFavorisChecked=true;
?>

<div class="container2">

    <h3 class="center-align">Rechercher un Bar</h3>
    <br>
    <br>

    <!-- BARRE DE RECHERCHE DES BARS -->
    <div class="row">

        <form method="get">

          <div class="input-field col l2 s6 offset-l1">
            <label for="nom_bar">Nom</label>
              <input type="text" name="nom_bar" id="nom_bar" class="autocomplete" value="<?= $nom_bar ?>"/>
          </div>


           <!-- <div class="input-field col l2 s6">
                <select name="distance" id="distance">
                    <option value="" disabled selected>Choisissez votre option</option>
                    <option>500M</option>
                    <option>1 Km</option>
                    <option>5 Km</option>
                    <option>Pas de Palier</option>
                </select>
                <label for="distance">Palier de Distance</label>
            </div> -->

            <div class="input-field col l2 s6">
                <select name="style_bar" id="style_bar">
                    <option value="">Choisissez votre option</option>
                    <?php
                    $reponse = $bdd->query('select * from styles_bars');
                    while ($style = $reponse->fetch()) {?>
                        <option value="<?= $style['id_style_bar'] ?>"
						<?= $style_bar==$style['id_style_bar'] ? 'selected' : '' ?>>
						<?= $style['nom_style_bar'] ?>
			</option>
                    <?php }
                    ?>
                </select>
                <label for="style">Style de Bar</label>
            </div>

            <div class="input-field col l2 s6">
                <select name="ouverture" id="ouverture">
                    <option value="" disabled selected>Choisissez votre option</option>
                    <option>En ce moment</option>
                    <option>Dans une heure</option>
                    <option>Dans la journée</option>
                    <option>Pas de restriction</option>
                </select>
                <label for="ouverture">Ouverture de l'Happy Hour</label>
            </div>


            <!--- <div class="input-field col l2 s6">
             <label>Ouverture de l'Happy Hour</label>
             <input type="radio" name="Ouverture" id="moment"> <label for="moment">En ce moment</label>
             <input type="radio" name="Ouverture" id="heure"><label for="heure">Dans une heure</label>
             <input type="radio" name="Ouverture" id="journee"><label for="journee">Dans la journée</label>
             <input type="radio" name="Ouverture" id="Pas_de_restriction"><label for="Pas_de_restriction">Pas de
             restriction</label>
             </div>
         --->
            <div class="input-field col l1 s6">
                <button class="waves-effect waves-light btn" type="submit" name="action">Rechercher</button>
            </div>

        </form> <!-- fin du formulaire -->

    </div> <!-- fin row -->

            <div class="row"> <!-- LISTE OU MAP -->
                <div class="col l3 offset-l9">
                    <div class="switch">
                        <label>
                            Liste
                            <input type="checkbox">
                            <span class="lever"></span>
                            Map
                        </label>
                    </div>
                </div>
            </div>

		<!-- AFFICHAGE DES BARS SELECTIONNES -->
			<?php	include('template_bars.php'); ?>
			
			<!-- SCRIPTS JQUERY -->
			
		<script type="text/javascript">
		$(function(){
			var $boutonFavoris = $(":checkbox");
			$boutonFavoris.change(function(){
				var $bar = $(this);
				var $bar_id = $bar.attr('id').replace('favoris','');
				var $id_user = 1;
				var $datas = 'id_bar='+$bar_id+'&id_user='+$id_user;
		
				var $ischecked = $(this).attr('checked');
				var $controllActionFavoris;
				console.log($controllActionFavoris);
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
					var $url ="../scripts/add_bar_favoris.php";
				}
				if($controllActionFavoris=="supprimer"){
					var $url ="../scripts/remove_bar_favoris.php";
				}
				console.log($bar_id);
				console.log($id_user);
	
				
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
		} 
		); //ajax		
		});
			
		});
		
		
		</script>

    
<?php include("footer.php"); ?>
