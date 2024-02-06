<?php
$nameserver = 'localhost';
$user = 'root';
$pass = '';
$db = 'preinscrition';
$link = mysqli_connect($nameserver,$user,$pass,$db);
if(!$link){
    die("Echec de connexion: ".mysqli_connect_error());
}
?>