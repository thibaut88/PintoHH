		
        <div class="container">
        <div class="row">
            <div class="col l10 offset-l1">
                <ul class="collapsible popout" data-collapsible="accordion">

                    <?php
					
					
				$sql="SELECT *
				FROM bieres AS bieres
                LEFT JOIN type_biere AS type_biere ON bieres.type_biere_id_type_biere = type_biere.id_type_biere
                LEFT JOIN pays AS pays ON bieres.pays_id_pays = pays.id_pays
                LEFT JOIN photos AS photos ON bieres.photos_id_photo = photos.id_photo
                ";
					
						//SI ON EST SUR LA PAGE FAVORIS
				if(isset($page_favoris) && $page_favoris==true){
					$sql.= " LEFT JOIN biere_favori ON bieres.id_biere = biere_favori.bieres_id_biere ";
				}
						//SI ON EST SUR LA PAGE FAVORIS
				if(isset($controlFavorisChecked) && $controlFavorisChecked==true){
					$sql.= " LEFT JOIN biere_favori ON bieres.id_biere = biere_favori.bieres_id_biere ";
				}							
				//identifiant user 
                if (isset($id_user)&&$id_user!==null){
					$sql.= " WHERE biere_favori.utilisateurs_id_utilisateur = $id_user ORDER BY nom_biere";
                }
				    $reponse = $bdd->query($sql);
					
			
					
                    while ($donnees = $reponse->fetch()) {
                        ?>

                        <li>
		
                            <div id="biereId-<?=$donnees['id_biere']?>"
				class="collapsible-header bar-font ">
				   <div class="row row2">
                                <div class="col l11 m8 s8">
				<h5><?php echo $donnees['nom_biere']; ?> </h5>
			         </div>
			          <div class="col l1 m4 s4">
					  <form action="#"><p>
					<input id="favoris<?=$donnees['id_biere']?>"type="checkbox" name="favoris"
					<?php
					if(isset($controlFavorisChecked)&&($controlFavorisChecked)==true){
						if($donnees['bieres_id_biere']!==null && $donnees['utilisateurs_id_utilisateur']!==null){
						echo "checked='checked'";
						}
					}
					if(isset($page_favoris)&&($page_favoris)==true){
						echo "checked='checked'";
					}
					?>
					/>
					<label for="favoris<?=$donnees['id_biere']?>"></label>
					</p></form>
				
			         </div>
			         </div>
			         </div>
							
			
                            <div class="collapsible-body white-font">


                                <div class="row">
                                    <div class="col l5">
				
				

                                        <p><?php echo $donnees['degree_biere']?></p>
                                    </div>

                                    <div class="col l3 offset-l4">
                                        <p>
                                            <i class="material-icons prefix">phone</i><?php echo "  " . $donnees['nom_type_biere']; ?>
                                        </p>
                                    </div>
                                </div><!-- fin row -->

                                <div class="row">
                                    <div>
                                        <p>Pays :<?php echo $donnees['nom_pays']; ?></p>
                                    </div>
                                </div><!-- fin row -->


                                <!-- BOUTON POUR LE MODAL -->
                                <div class="center">
                                    <a class="waves-effect waves-light btn modal-trigger"
                                       href="#<?php echo $donnees['id_biere']; ?>">Voir la fiche complète de cette bière</a>
                                </div>

                                <br>

                                <!-- MODAL - FICHE COMPLETE DU BAR -->
                                <div id="<?php echo $donnees['id_biere']; ?>" class="modal">
                                    <div class="modal-content grey-font">
                                        <h4 class="bar-font"><?php echo $donnees['nom_biere']; ?></h4>
                                        <p><?php echo $donnees['description']; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"><i
                       class="large material-icons prefix">close</i></a>
                                    </div>

                                </div>  <!-- FIN DU MODAL -->


                            </div> <!-- FIN DU COLLAPSE -->
                        </li>

                        <?php
			}
			?>

                </ul>
            </div>
        </div>
        </div>