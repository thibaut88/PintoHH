<?php include("config.php"); ?>

<?php include("header.php"); ?>


<h2>Formulaire de Recherche de Bière avec Filtre: </h2>

<form method="post" action="#">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom">

    <label>Localisation</label>
    <input type="text" placeholder="Latitude">
    <input type="text" placeholder="Longitude">

    <label for="Distance">Palier de Distance</label>
    <select name="Distance" id="Distance">
        <option>500M</option>
        <option>1 Km</option>
        <option>5 Km</option>
        <option>Pas de Palier</option>
    </select>

    <label for="Degre"> Degré D'alcool </label>
    <select name="Degre" id="Degre">
        <option>Sans Alcool</option>
        <option>4 %</option>
        <option>7 %</option>
        <option>10 %</option>
    </select>

    <label for="Type">Type de Bière</label>
    <select name="Type" id="Type">
        <option>Brune</option>
        <option>Blonde</option>
        <option>Blanche</option>
        <option>Ambré</option>
        <option>Aromatisé</option>
    </select>

    <label for="Provenance">Provenance</label>
    <select name="Provenance" id="Provenance">
        <option>Français</option>
        <option>Belge</option>
        <option>Allemande</option>
    </select>

    <label>Bar en Happy Hour</label>
    <input type="radio" name="happy" id="Restriction"> <label for="Restriction">Pas de Restriction</label>
    <input type="radio" name="happy" id="Restriction"> <label for="Restriction">Dans la journée</label>
    <input type="radio" name="happy" id="Restriction"> <label for="Restriction">Dans une heure</label>
    <input type="radio" name="happy" id="Restriction"> <label for="Restriction">En ce Moment</label>

    <input type="submit" value="Rechercher">
</form>

<?php include("footer.php"); ?>