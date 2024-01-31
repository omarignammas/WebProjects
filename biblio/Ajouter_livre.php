<?php 
session_start();
include 'connexion.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Ajouter livre</title>
     <style>
        body {
    font-family: 'Poppins', sans-serif;    background-color: whitesmoke;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 170vh;
}

.container {
    padding: 20px;
    width: 600px;
    text-align: center;
    border:3px solid #3498db;
    border-radius:7px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);

}

label {
    display: block;
    margin: 15px 0 5px;
    text-align: left;
    font-family: 'Poppins', sans-serif;  
    font-weight: bold;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.input{
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
}

button {
    background-color: #3498db;
    margin-left:6%;
    color: #fff;
    cursor: pointer;
    padding: 10px;
    width: 25%;
    border: none;
    border-radius: 4px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

}

button:hover {
    background-color: #2980b9;
}

     </style>
</head>
<body>
    <div class="container">
    
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Formulaire d'ajout d'un livre:</h2>

            <label for="titre">Titre du livre</label>
            <input type="text" name="titre"  placeholder="Entrer le titre" required>

            
            <label for="auteur">Auteur du livre</label>
            <input type="text" name="auteur" placeholder="Entrer l'auteur"   required>

            <label for="photo">Photo</label>
            <input type="file" href="index.php" name="photo" accept="photo/*" >

           
            <button type="submit" name="sub">Ajouter</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $titre = $_POST['titre'];
            $auteur = $_POST['auteur'];
if(isset($_FILES['photo']) and $_FILES['photo']['error']==0){
    $dossier='photo/';
    $temp_name=$_FILES['photo']['tmp_name'];
    if(!is_uploaded_file($temp_name)){
        exit("le fichier est introuvable!");
    }
if($_FILES['photo']['size']>=1000000){
     exit("Erreur,fichier stockage ");
}
$infosfichier=pathinfo($_FILES['photo']['name']);
$extension_upload=$infosfichier['extension'];

$extension_upload=strtolower($extension_upload);
$extension_autorities=array('png','jpeg','jpg');

if(!in_array($extension_upload,$extension_autorities)){
    exit("Erreur,Veuillez inserer une image svp (extentions autorisee png)");
}
$nom_photo=$titre.".".$extension_upload;
if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Probleme dans telechargement de l'image,Ressayer!");
}
$ph_photo=$nom_photo;
}
else{
    $ph_photo="SANS_IMAGE.png";
            }
        $_SESSION['photo']=$ph_photo; //j'ai stocker la photo pour la re-afficher dans le cv 
        }
        ?>
        <?php
        if(isset($_POST['sub'])){
            $query = "INSERT INTO `livre` (`titre_livre`, `auteur`, `image_livre`) VALUES
            ('$titre','$auteur','$ph_photo')";
              if (mysqli_query($link, $query)) {
                ob_end_clean();
                header('location:list_livres.php');
                exit;
            }
            else{
                echo "<h3> votre insertion est erronee !</h3>";
            }
        }
        mysqli_close($link);
        ?>
    </div>
</body>
</html>