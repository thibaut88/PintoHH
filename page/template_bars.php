       

	   <!-- AFFICHAGE DES BARS SELECTIONNES -->
            <div class="row">
            <div class="col l10 offset-l1">
            <ul class="collapsible popout" data-collapsible="accordion">

                <?php
				//REQUETE EN FONCTION DE LA PAGE 
				
				//DEFAULT
                $sqlQuery = 'SELECT * FROM bars 
                LEFT JOIN photos
                ON photos.id_photo=bars.photos_id_photo
                LEFT JOIN styles_bars 
                ON styles_bars.id_style_bar=bars.styles_bars_id_style_bar ';
				
				// SI PAGE FAVORIS OU CONTROLFAVORISCHECKED
				if((isset($page_favoris) && $page_favoris==true)||(isset($controlFavorisChecked)&&$controlFavorisChecked==true)){
					$sqlQuery.=' LEFT JOIN bar_favori ON bars.id_bar = bar_favori.bars_id_bar ';
				}
				//SI ON EST SUR LA PAGE FAVORIS
				//CHARGER TABLE bar_favori ET utilisateurs
				if(isset($page_favoris) && $page_favoris==true){
				$sqlQuery.=' LEFT JOIN utilisateurs ON bar_favori.utilisateurs_id_utilisateur = utilisateurs.id_utilisateur ';
				}
				//NOM BAR 
                $sqlQuery .=' WHERE nom_bar LIKE "%'.$nom_bar.'%" ';
				
				//STYLE DU BAR 
                if ($style_bar!==null){
                    $sqlQuery .= ' AND bars.styles_bars_id_style_bar = '.$style_bar;
                }
				//SI USER CONNECTER 
                if (isset($id_user)&&$id_user!==null){
                    $sqlQuery .= ' AND utilisateurs.id_utilisateur = '.$id_user;
                }
				//ORDRE AFFICHAGE 
				$sqlQuery.=" ORDER BY bars.nom_bar";
				//SEND QUERY
                $reponse = $bdd->query($sqlQuery);
				//DEBUG
				
				//FETCH TABLEAU
                while ($donnees = $reponse->fetch()) { ?>
					
                    <!--------------------------------------------- NIVEAU 1 --------------------------------------------->
                    <li>
                        <div  class="collapsible-header bar-font"> <!-- NIVEAU 1 -->
                            <div class="row row2">
                                <div class="col l4 m12 s12">
                                   <h5> <?php echo $donnees['nom_bar']; ?> </h5>
				
                                </div>

                                <div class="col l4 m6 s12">
                                    <i class="material-icons">alarm</i>
                                    Happy Hour en ce moment
                                </div>

                                <div class="col l3 m5 s10">
                                    <i class="material-icons prefix">location_on</i>
                                    Situé à 1,2 km
                                </div>

                                <div class="col l1 m1 s2">
                                    <input type="checkbox" id="favoris<?=$donnees['id_bar']?>"
					<?php 
					if(isset($page_favoris)&&$page_favoris==true){
						echo "checked='checked'";
					}
					if(isset($controlFavorisChecked)&&$controlFavorisChecked==true){
							// SI LUSER A CE BAR DANS SES FAVORIS COCHER LA CASE
						if($donnees['bars_id_bar']!==null && $donnees['utilisateurs_id_utilisateur']!==null){
						echo "checked='checked'";
						}
					}
					?>
					/>
                                    <label for="favoris<?php echo $donnees['id_bar']; ?>"></label>
                                </div>
                              
                            </div> <!-- Fin de la row -->

                            <div class="row row2">
                                <div class="col l4 offset-l4">
                                    <i class="material-icons">euro_symbol</i>
                                    Pinte à partir de 5€
                                </div>
                            </div> <!-- Fin de la row -->

                        </div> <!-- FIN NIVEAU 1 -->

                        <!--------------------------------------------- NIVEAU 2 --------------------------------------------->
                        <div class="collapsible-body white-font">

                            <div class="row row2">

                                    <div class="col l8 m7 s12">

                                        <p>
                                            <i class="material-icons">gps_fixed</i>
                                       <?php echo $donnees['numero'] . " " . $donnees['rue'] . ", EPINAL" ?>
                                        <br>
                                        <i class="material-icons prefix">phone</i><?php echo "  " . $donnees['telephone']; ?>
                                            <br>
                                            <i class="material-icons">blur_on</i>
                                            Type de bar : <?php echo $donnees['nom_style_bar']; ?>
                                        </p>


                                        <!-- BOUTON POUR LE MODAL -->
                                        <div class="center">
                                            <a class="waves-effect waves-light btn modal-trigger"
					href="#<?php echo $donnees['id_bar']; ?>">Voir la fiche complète du bar</a>
                                        </div>

                                        <br>

                                     </div> <!-- fin partie gauche -->

                                    <div class="col l4 m5 s12">
                                            <?php
                                            //afficher une photo
                                            echo  "<img src='". $donnees['fichier'] . "' width='100%'>";
                                            ?>
                                    </div><!-- fin partie droite -->


                            </div> <!-- FIN 1ere row -->


                            <!--------------------------------------------- NIVEAU 3 --------------------------------------------->

                            <!-- MODAL - FICHE COMPLETE DU BAR - NIVEAU 3-->
                            <div id="<?php echo $donnees['id_bar']; ?>" class="modal">
                                <div class="modal-content grey-font">

                                    <div class="row">
                                        <div class="col l4 m12 s12">
                                            <h5> <?php echo $donnees['nom_bar']; ?> </h5>
                                        </div>

                                        <div class="col l4 m6 s12">
                                            <i class="material-icons">alarm</i>
                                            Happy Hour en ce moment
                                            <br>
                                            <i class="material-icons prefix">location_on</i>
                                            Situé à 1,2 km
                                            <br>
                                            <i class="material-icons">euro_symbol</i>
                                            Pinte à partir de 5€
                                        </div>

                                        <div class="col l4 m6 s12">
                                            <i class="material-icons">gps_fixed</i>
                                            <?php echo $donnees['numero'] . " " . $donnees['rue'] . ", EPINAL" ?>
                                            <br>
                                            <i class="material-icons prefix">phone</i><?php echo "  " . $donnees['telephone']; ?>
                                            <br>
                                            <i class="material-icons">blur_on</i>
                                            Type de bar : <?php echo $donnees['nom_style_bar']; ?>
                                        </div>
                                    </div> <!-- Fin de la row header-->


                                    <div class="row">
                                        <p><?php echo utf8_encode($donnees['description']); ?></p>
                                    </div>

                                    <?php /*
                                    $sqlQuery = 'SELECT * FROM bars
                                    LEFT JOIN galerie_bar
                                    ON bars.id_bar=galerie_bar.bars_id_bar
                                    LEFT JOIN photos
                                    ON photos.id_photo=galerie_bar.bars_id_bar

                                    ';

                                    while ($donnees = $reponse->fetch()) {
                                    ?>

                                    <?php } */?>

                                    <div class="row">
                                    <div class="carousel">
                                        <img src="<?php echo ($donnees['fichier']); ?>"></a>
                                    </div>
                                    </div>


                                    <div class="row">

                                        <div






                                <div class="modal-footer">
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><i
                                            class="large material-icons prefix">close</i></a>
                                </div>
                                </div>

                            </div>  <!-- FIN DU MODAL NIVEAU 3-->


                        </div> <!-- FIN DU COLLAPSE NIVEAU 2-->


                    </li>

<br>					
				
             <?php   }

                ?>

            </ul>

              <?php
                //afficher une photo
       //        $sqlQuery = 'SELECT * FROM photos
         //      ';
//
  //           $reponse = $bdd->query($sqlQuery);
    //          while ($donnees = $reponse->fetch()) {
      //        echo  "<img src='". $donnees['fichier'] . "' height='100px'>";
        //        }

                ?>

        </div>
    </div> <!-- fin COL -->

</div> <!-- fin ROW -->
