<?php 
session_start();
 require "../config.php";
 ?>
 <?php
 
 
 //TEMPORAIRE A ENLEVER POUR SE CONNECTER ET POUR GERER LES FAVORIS
 if(isset($_POST)&&!empty($_POST['action'])){
	 session_destroy();
	session_start();
	 $pass = $_POST['password'];
	 $email = $_POST['email'];

	$_SESSION['email'] = $email;
	$_SESSION['pass'] = $pass;
	var_dump($_SESSION); 
 }
 
 
 ?>
 <?php
 include("header.php");
?>

<div class="container">

    <br>
    
    <h3 class="center-align">CONNECTION</h3>
<form action="connexion.php" method="post">
    <div class="row">
        <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix">account_circle</i>
            <input name="email"id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix" class="">Identifiant</label>
        </div>
    </div> <!-- fin row -->

    <div class="row">
        <div class="input-field col s4 offset-s4">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" name="password"type="password" class="validate">
            <label for="password">Mot de passe</label>
        </div>
    </div><!-- fin row -->

    <br>
    <br>

<div class="center">
    <input class="waves-effect waves-light btn" type="submit" name="action" value="ajouter">
</div>
</form>
    <br>
    <br>


</div> <!-- fin container -->

<?php include("footer.php"); ?>