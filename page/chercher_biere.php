<?php include("../config.php"); ?>

<?php include("header.php"); ?>


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

        <!-- résultats de la recherche en liste" -->
        <div class="row">
            <div class="col l10 offset-l1">
                <ul class="collapsible popout" data-collapsible="accordion">

                    <?php
                    $reponse = $bdd->query
                    ('SELECT id_biere, nom_type_biere, nom_pays, fichier, nom_biere, degree_biere, prix_normal, prix_happy, description
                    FROM bieres AS bieres
                    LEFT JOIN type_biere AS type_biere ON bieres.type_biere_id_type_biere = type_biere.id_type_biere
                    LEFT JOIN pays AS pays ON bieres.pays_id_pays = pays.id_pays
                    LEFT JOIN photos AS photos ON bieres.photos_id_photo = photos.id_photo
                    ');
                    while ($donnees = $reponse->fetch()) {
                        ?>

                        <li>
                            <div class="collapsible-header bar-font"><?php echo $donnees['nom_biere']; ?></div>
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
                                        <p>Type de bar : <?php echo $donnees['nom_pays']; ?></p>
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
                                        <a href="#!"
                                           class=" modal-action modal-close waves-effect waves-green btn-flat"><i
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

<?php include("footer.php"); ?>