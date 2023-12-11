<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ensak_events";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])){
// Récupérer les données du formulaire
$nom_org =  $_POST['nom_org'];
$description =$_POST['description'];
$nbr_place = $_POST['nbr_place'];
$transport = $_POST['transport'];
$sponsoring = $_POST['sponsoring'];
$ouvert = $_POST['ouvert'];
$payant = $_POST['payant'];
$stand = $_POST['stand'];
$type = $_POST['type'];
$date = $_POST['date'];
$lieu = $_POST['lieu'];

// Télécharger l'image
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
$nom_photo=$nom_org.".".$extension_upload;
if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("<h2>Probleme dans telechargement de l'image,Ressayer!</h2>");
}

}
// Insérer les données dans la base de données
    $sql = "INSERT INTO depose_evenement (photo,nom_org,description, nbr_place, transport, sponsoring, ouvert, payant, stand, type, date, lieu)
        VALUES ('$nom_photo','$nom_org','$description', '$nbr_place', '$transport', '$sponsoring', '$ouvert', '$payant', '$stand', '$type', '$date', '$lieu')";

if ($conn->query($sql) === TRUE) {
    header('location:promotion_envoyer.html');
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}
}    

$conn->close();
?>
