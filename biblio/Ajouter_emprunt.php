<?php 
session_start();
include 'connexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Ajout emprunt</title>
     <style>
        body {
    font-family: 'Poppins', sans-serif;
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
textarea,select {
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

h2{
    font-family: 'Poppins', sans-serif; 
}

     </style>
</head>
<body>
    <div class="container">
    
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Formulaire d'ajout d'un emprunts:</h2>

        <label for="etudiant">Etudiant</label>
        <select class ="input" name="etudiant" required>
        <?php
        $re = " SELECT  * FROM etudiant ;";
        $resultat = mysqli_query($link,$re);
        while($data = mysqli_fetch_assoc($resultat)){
            echo"<option value=".$data['num_apogee'].">".$data['nom']."</option>";
        }
        ?>
        </select>

            
        <label for="titre_livre">Titre du livre</label>
        <select class ="input" name="titre_livre" placeholder="Entrer le titre du livre" required>
        <?php
        $re = "SELECT * FROM livre ;";
        $resultat = mysqli_query($link,$re);
        while($data1 = mysqli_fetch_assoc($resultat)){
            echo"<option value=".$data1['isbn'].">".$data1['titre_livre']."</option>";
        }
        ?>
        </select>

            <label for="dt_emprunt">Date d'emprunt</label>
            <input type="date" name="dte" required>

            <label for="dt_retour">Date de retour</label>
            <input type="date" name="dtr"  required>

           
            <button type="submit" name="sub">Ajouter</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['sub'])){

            $id_gest = $_SESSION['id_gestionaire'];
            $id_etudiant = $_POST['etudiant'];
            $id_livre = $_POST['titre_livre'];
            $dte = $_POST['dte'];
            $dtr = $_POST['dtr'];

            $query = "INSERT INTO `emprunt` (`id_etudiant`, `id_livre`, `dt_debut`,`dt_retour`,`id_gestionaire`) VALUES
            ( $id_etudiant, $id_livre,'$dte','$dtr', $id_gest)";
              if (mysqli_query($link, $query)) {
                header('location:list_emprunts.php');
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