<?php
$dbhost = 'localhost';
$dbname = 'pinto';
$dbuser = "root";
$dbpassword = 'root';

try {
    $bdd = new PDO('mysql:host='.$dbhost. ';dbname='.$dbname, $dbuser, $dbpassword  );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

catch (PDOException $e) {
    die('Une Erreur est survenue lors de la Connexion à la base de donnée');
}
?>
