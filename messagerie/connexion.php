<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "messagerie";

$link=mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error($conn));
}
?>