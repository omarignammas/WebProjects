<?php
include('connexion.php');

if(isset($_POST['sub'])){
    $numapp=$_POST['numap'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom1'];

if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
    $dossier='photo/';
    $temp_name=$_FILES['fichier']['tmp_name'];
    if(!is_uploaded_file($temp_name)){
        exit("le fichier est introuvable!");
    }
if($_FILES['fichier']['size']>=1000000){
     exit("Erreur,votre fichier est voluminaux");
}
$infosfichier=pathinfo($_FILES['fichier']['name']);
$extension_upload=$infosfichier['extension'];

$extension_upload=strtolower($extension_upload);
$extension_autorities=array('png','jpeg','jpg');

if(!in_array($extension_upload,$extension_autorities)){
    exit("Erreur,Veuillez inserer une image svp (extentions autorisee png)");
}
$nom_photo=$numapp.".".$extension_upload;
if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Probleme dans telechargement de l'image,Ressayer!");
}
$ph_photo=$nom_photo;
}
else{
    $ph_photo="inconnu.jpg";
}
$requete="INSERT INTO etudiant VALUES ('$numapp','$nom','$prenom','$ph_photo')";
$resultat=mysqli_query($link,$requete);
header('location:affichage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Etudiant</title>
</head>
<body>
    <form action="" method="POST" id="monform" enctype="multipart/form-data">
        <label for="numap">Numero d'appogee:</label>
        <input type="text" name="numap" required="required"><br>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" placeholder="Entrer nom etudiant"><br>
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom1" placeholder="Entrer prenom etudiant"><br>
        <label for="fichier">Photo:</label>
        <input type="file" name="fichier"><br>
        <input type="submit" name="sub" value="valider"  style="width:200px;text-align:center;">

    </form>
</body>
</html>
<?php mysqli_close($link); ?>
