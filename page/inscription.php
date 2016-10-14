<?php include("header.php"); ?>
<?php
    require "../config.php";
?>

<div class="container">

    <br>
    
    <h3 class="center-align">INSCRIPTION</h3>


    <div class="row">

        <div class="input-field col s4 offset-s1">
            <i class="material-icons prefix">person_add</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix" class="">Nom</label>
        </div>

        <form class="input-field col s4 offset-s1">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Email *</label>
        </form>

    </div> <!-- fin row -->


    <div class="row">

        <div class="input-field col s4 offset-s1">
            <i class="material-icons prefix">cake</i>
            <input type="date" class="datepicker">
            <label class="active" for="first_name2">Date de naissance</label>
        </div>


  <!---      <div class="input-field col s4 offset-s1">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" type="password" class="validate">
            <label for="password">Sexe</label>
        </div>

  -->

        <div class="input-field col s4 offset-s1">
        <form action="#">
            <i class="material-icons prefix">wc</i>
            <label>Sexe</label>
            <br>
            <p>
                <input name="group1" type="radio" id="test1" />
                <label for="test1">Femme</label>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <input name="group1" type="radio" id="test2" />
                <label for="test2">Homme</label>
            </p>

        </form>
        </div>

    </div>

    <br>

    <div class="row">

        <div class="input-field col s4 offset-s1">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix" class="">Identifiant *</label>
        </div>
        
    </div> <!-- fin row -->


    <div class="row">

        <div class="input-field col s4 offset-s1">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" type="password" class="validate">
            <label for="password">Mot de passe *</label>
        </div>

        <div class="input-field col s4 offset-s1">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" type="password" class="validate">
            <label for="password">Vérification de mot de passe *</label>
        </div>

    </div> <!-- fin row -->

    <p>* Champs obligatoires</p>

    <br>
    <br>

<div class="center">
    <a class="waves-effect waves-light btn" type="submit" name="action">Valider</a>
</div>

    <?php
    $reponse = $bdd->query('SELECT * FROM utilisateurs');
    ?>


    <br>
    <br>


</div> <!-- fin container -->

<?php include("footer.php"); ?>