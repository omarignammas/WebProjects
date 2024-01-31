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
    <title>Inscription</title>
     <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: whitesmoke;
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
}

label {
    display: block;
    margin: 15px 0 5px;
    text-align: left;
    font-family: sans-serif;
    font-weight: bold;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
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
    margin-left:10%;
    color: #fff;
    cursor: pointer;
    padding: 10px;
    width: 25%;
    border: none;
    border-radius: 4px;
    font-weight: bold;
    font-family: sans-serif;
}

button:hover {
    background-color: #2980b9;
}

     </style>
</head>
<body>
    <div class="container">
    
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Formulaire de votre CV :</h2>

            <label for="login">Login</label>
            <input type="text" name="login" required>

            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>

            <label for="nom">nom</label>
            <input type="text" name="nom" required>

            <label for="prenom">Prenom </label>
            <input type="text" name="prenom" required>

            
            <label for="Date_naissance">Date de naissance</label>
            <input type="date" name="Date_naissance" required>

            <label for="Ville">Ville</label>
            <select class="input" name="Ville">

                <?php $req="SELECT * FROM ville";
                      $ss=mysqli_query($link,$req);
                while ($data=mysqli_fetch_assoc($ss) ){
                echo '<option value="'.$data['lib_ville'].'">'.$data['lib_ville'].'</option>';
                }
                ?>
            </select>

            <label for="phto">Photo</label>
            <input type="file" href="index.php" name="phto" accept="photo/*" required>

           
            <button type="submit" name="sub">Inscription</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $login = $_POST['login'];
            $pass = $_POST['password'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $datenaissance = $_POST['Date_naissance'];
            $ville = $_POST['Ville'];
            $rville = "SELECT `id_ville` FROM `ville` WHERE lib_ville = '$ville'";
            
                if ($resultville = mysqli_query($link,$rville)){
                $row = mysqli_fetch_assoc($resultville);
                if ($row) {
                    $id_ville = $row['id_ville'];
                }
            }
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
        $_SESSION['photo']=$ph_photo; //j'ai stocker la photo pour la re-afficher dans le cv 
        }
        ?>
        <?php
        if(isset($_POST['sub'])){
        $q = "SELECT * FROM user WHERE login = '$login'";
        $r = mysqli_query($link,$q);
        if(mysqli_num_rows($r)==0){
            $query = "INSERT INTO `user` (`login`, `passe`, `nom`, `prenom`, `date_naissance`, id_ville, `photo`) VALUES
            ('$login','$pass','$nom','$prenom','$datenaissance','$id_ville','$ph_photo')";
              if (mysqli_query($link, $query)) {
                ob_end_clean();
                header('location: index.php');
                exit;
            }
        }
        else{
            echo"<h3>SVP, Veuillez changer votre login  !!!</h3>";
        }
    }
        mysqli_close($link);
        ?>
    </div>
</body>
</html>