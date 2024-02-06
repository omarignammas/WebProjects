<?php
session_start();

include "connexion.php"

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $cne = $_SESSION['cne'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $situation = $_POST['situation'];
    $date_naissance = $_POST['date_naissance'];
    $ville_naissance = $_POST['ville_naissance'];
    $adresse = $_POST['adresse'];
    $province = $_POST['province'];
    $telef = $_POST['telef'];
    $serie_bac = $_POST['serie_bac '];
    $mention = $_POST['mention'];
    $etab = $_POST['etab'];
    $photo = $_POST['photo'];
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
    $nom_photo=$cne.".".$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
        exit("Probleme dans telechargement de l'image,Ressayer!");
    }
    $ph_photo=$photo;
    }
    else{
        $ph_photo="inconnu.jpg";
    }
    $requete1 = "UPDATE `etudiants` SET 
    `nom`='" . mysqli_real_escape_string($link, $nom) . "', 
    `prenom`='" . mysqli_real_escape_string($link, $prenom) . "', 
    `sexe`='" . mysqli_real_escape_string($link, $sexe) . "', 
    `date_naissance`='" . mysqli_real_escape_string($link, $date_naissance) . "', 
    `ville_naissance`='" . mysqli_real_escape_string($link, $ville_naissance) . "', 
    `situation_familliale`='" . mysqli_real_escape_string($link, $situation) . "', 
    `adresse`='" . mysqli_real_escape_string($link, $adresse) . "', 
    `tel`='" . mysqli_real_escape_string($link, $telef) . "', 
    `photo`='" . mysqli_real_escape_string($link, $ph_photo) . "' 
     WHERE `cne` = '" . mysqli_real_escape_string($link, $cne) . "';";
    
    $resultat1 = mysqli_query($link, $requete1);
    $code_etd = mysqli_query($link,"SELECT code_etudiant FROM etudiants WHERE
    cne = $cne ");

    $code_bac = mysqli_query($link,"SELECT code_bac FROM bac WHERE
    lib_bac = $serie");

    $code_men = mysqli_query($link,"SELECT code_men FROM mention WHERE
    lib_men = $mention ");

    $code_etb = mysqli_query($link,"SELECT code_etb FROM etablissement WHERE
    lib_etb = $etab ");

    $requete2 = "INSERT INTO bac_etudiant (code_etudiant,code_bac,code_men,
    code_etb) VALUES ($code_etd , $code_bac , $code_men , $code_etb) ";
    echo"<h1>Modification reussite!!!</h1><br><br>";?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        table {
         width: 100%;
         border-collapse: collapse;
         border-radius: 8px;
         margin-top: 20px;
        }

        th, td {
         padding: 10px;
         border: 1px solid #ddd;
         text-align: left;
        }

        th {
         background-color: #3498db;
         color: #fff;
        }

    </style>

</head>
<body>
<table border="1">
    <tr>
        <th>attribut</th>
        <th>contenu</th>
    </tr>
    <tr>
        <td>nom :</td>
        <td><?php echo $nom ;?></td>
    </tr>
    <tr>
        <td>prenom :</td>
        <td><?php echo $prenom ;?></td>
    </tr>
    <tr>
        <td>sexe :</td>
        <td><?php echo $sexe ;?></td>
    </tr>
    <tr>
        <td>date_naissance :</td>
        <td><?php echo $date_naissance ;?></td>
    </tr>
    <tr>
        <td>ville_de_naissance :</td>
        <td><?php echo $ville_naissance ;?></td>
    </tr>
    <tr>
        <td>situation familliale :</td>
        <td><?php echo $situation ;?></td>
    </tr>
    <tr>
        <td>cne :</d>
        <td><?php echo $cne ;?></td>
    </tr>
    <tr>
        <td>adreese :</td>
        <td><?php echo $adresse ;?></td>
    </tr>
    <tr>
        <td>tel :</td>
        <td><?php echo $telef ;?></td>
    </tr>
    <tr>
        <td>photo :</td>
        <td><?php echo $ph_photo ;?></td>
    </tr>
</table>

</body>
</html>

<?php
    

};
?>