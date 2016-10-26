<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>PINTO HAPPY HOUR</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/www/PINTOHH/materialize/materialize.css">
    <link rel="stylesheet" type="text/css" href="/www/PINTOHH/feuille.css">
    <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">


</head>

<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/www/PINTOHH/materialize/materialize.js"></script>
<script type="text/javascript" src="/www/PINTOHH/scripts.js"></script>

<nav>
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center">PINTO HAPPY HOUR</a>
        <ul class="right hide-on-med-and-down">
		<?php if(isset($page)&&$page !=="admin"){?>
			<li><a class="waves-effect waves-light btn" href="/www/PINTOHH/page/inscription.php">Inscription</a></li>
			<li><a class="waves-effect waves-light btn"  href="/www/PINTOHH/page/connexion.php">Connexion</a></li>
			
	<?php	} ?>

        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">

        <a href="/PintoHH/index.php">
        <div class="col l4 s4" style="background-color: #EB9532">
            <img src="/www/PINTOHH/images/bonhomme.png" width="100px" class="center-block">
        </div>
        </a>

        <a href="#">
        <div class="col l4 s4" style="background-color: #F5AB35">
            <img src="/www/PINTOHH/images/megaphone.png" width="100px" class="center-block">
        </div>
        </a>

        <a href="#">
        <div class="col l4 s4" style="background-color: #F27935">
            <img src="/www/PINTOHH/images/plane.png" height="100px" class="center-block">
        </div>
        </a>

    </div>
</div>


