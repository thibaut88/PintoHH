<?php 
 require "../config.php";
 include("header.php");
?>

<div class="container">

    <br>
    
    <h3 class="center-align">CONNECTION</h3>

    <div class="row">
        <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix" class="">Identifiant</label>
        </div>
    </div> <!-- fin row -->

    <div class="row">
        <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" type="password" class="validate">
            <label for="password">Mot de passe</label>
        </div>
    </div><!-- fin row -->

    <br>
    <br>

<div class="center">
    <a class="waves-effect waves-light btn" type="submit" name="action">Envoyer</a>
</div>

    <br>
    <br>


</div> <!-- fin container -->

<?php include("footer.php"); ?>