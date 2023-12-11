<?php
$link=mysqli_connect("localhost","root","","chat2") or die("echec de connexion a la base");
if(isset($_POST['sub'])){
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];

if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
    $dossier='photo/';
    $temp_name=$_FILES['fichier']['tmp_name'];
    if(!is_uploaded_file($temp_name)){
        exit("le fichier est introuvable!");
    }
if($_FILES['fichier']['size']>=1000000){
     exit("Erreur,fichier stockage ");
}
$infosfichier=pathinfo($_FILES['fichier']['name']);
$extension_upload=$infosfichier['extension'];

$extension_upload=strtolower($extension_upload);
$extension_autorities=array('png','jpeg','jpg');

if(!in_array($extension_upload,$extension_autorities)){
    exit("Erreur,Veuillez inserer une image svp (extentions autorisee png)");
}
$nom_photo=$login.".".$extension_upload;
if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Probleme dans telechargement de l'image,Ressayer!");
}
$ph_photo=$nom_photo;
}
else{
    $ph_photo="inconnu.jpg";
}
$requete="INSERT INTO user (login ,pass ,nom ,prenom ,photo) VALUES ('$login','$pass','$nom','$prenom','$ph_photo')";
$resultat=mysqli_query($link,$requete);

header('location:authentification.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: whitesmoke;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
            
        }

        input[type="file"] {
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        p {
            font-size: 14px;
            color: #555;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="login">Login:</label>
        <input type="text" name="login" required="required">

        <label for="pass">Password:</label>
        <input type="password" name="pass" placeholder="Enter password">

        <label for="nom">Nom:</label>
        <input type="text" name="nom" placeholder="Entrer nom">

        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" placeholder="Entrer prenom">

        <label for="fichier">Photo:</label>
        <input type="file" name="fichier">

        <input type="submit" name="sub" value="S'inscrire">
    </form>
</body>
</html>
