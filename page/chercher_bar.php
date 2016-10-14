<h2>Formulaire de Recherche de Bar: </h2>

<form method="post" action="#">

    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom"/>

    <label>Localisation</label>
    <input type="text" placeholder="Longitude" name="Longitude"/>
    <input type="text" placeholder="Latitude" name="Latitude"/>

    <label for="distance">Palier de Distance</label>
    <select name="distance" id="distance">
        <option>500M</option>
        <option>1 Km</option>
        <option>5 Km</option>
        <option>Pas de Palier</option>
    </select>

    <label for="quartier">Quartier de la ville </label>
    <select name="quartier" id="quartier">
        <option>Centre Ville</option>
        <option>Port</option>
        <option>La Zup</option>
        <option>La Vierge</option>
        <option>Bitola</option>
        <option>Saut-le-Cerf</option>
    </select>

    <label for="style">Style de Bar</label>
    <select name="style" id="style">
        <option>Lourge</option>
        <option>Bar de</option>
        <option>Pub</option>
        <option>Brasserie</option>
    </select>

    <label>Ouverture de l'Happy Hour</label>
    <input type="radio" name="Ouverture" id="moment"> <label for="moment">En ce moment</label>
    <input type="radio" name="Ouverture" id="heure"><label for="heure">Dans une heure</label>
    <input type="radio" name="Ouverture" id="journee"><label for="journee">Dans la journée</label>
    <input type="radio" name="Ouverture" id="Pas_de_restriction"><label for="Pas_de_restriction">Pas de
    restriction</label>


    <input type="submit" value="Rechercher"/>


</form>
