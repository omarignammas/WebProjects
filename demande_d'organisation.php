<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ensak_Events";


$conn=mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error($conn));
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$nom_org = $_POST['nom_org'];
$type = $_POST['type'];
$description = $_POST['description'];
$nom_resp = $_POST['nom_resp'];
$prenom_resp = $_POST['prenom_resp'];
$cin_resp = $_POST['cin_resp'];



$sql = "INSERT INTO demande_organisations (email, pass ,nom_org,Type, description, nom_resp, prenom_resp, CIN_resp) VALUES ('$email','$PASSWORD','$nom_org', '$type', '$description', '$nom_resp', '$prenom_resp', '$cin_resp')";
$result=mysqli_query($conn,$sql);
if ($result){
    

   header("location:verification.html");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
?>

