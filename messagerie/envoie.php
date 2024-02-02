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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Creer Compte</title>
     <style>

body {
    font-family: 'Poppins', sans-serif;    background-color: whitesmoke;
    margin: 0;
    padding: 0;
    display: inline-block;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

header {
            width:100%;
            align-items:center;
            background-color: #3498db;
            color: #fff;
            padding: 1em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
        }

nav {
            
            padding: 1.5em;
            width:100%;
            
        }

nav ul {
            
            list-style: none;
            margin: 0;
            padding: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

nav ul li {
            display: inline;
            margin-right: 120px;
            font-size: 1.2rem;
            text-transform: none;
            border-radius: 8px;
            padding: 5px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }
nav ul li a:hover{
            color: #b1abab;
            transition: 0.3 ease;
            
        }

a{
         text-decoration: none;
         color: whitesmoke;
         font-weight:bold ;
        }
        
.container {
    margin-top:8%;
    margin-left:28%;
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

h2{
    font-family: 'Poppins', sans-serif;
}

     </style>
</head>
<body>
<header>
    <nav>
            <ul>
                <li><a href="boite_reception.php">Boite de reception</a></li>
                <li><a href="envoie.php">Envoyer message</a></li>
                <li><a href="boite_envoie.php">Message Envoyees</a></li>
                <li><a href="profil.php">Modifier profil</a></li>
                <li><a href="index.php">Se deconnecter</a></li>
            </ul>
        </nav>
    </header> 
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Envoyer un message</h2>

            <label for="dest">Destinataire</label>
            <select class ="input" name="dest" required>
            <?php
             $re = " SELECT * FROM Utilisateurs JOIN Messages ON Utilisateurs.IdUtilisateur = Messages.IdDestinataire ;";
            $resultat = mysqli_query($link,$re);
             while($data = mysqli_fetch_assoc($resultat)){
             echo"<option value=".$data['IdDestinataire'].">".$data['Nom']." ".$data['Prenom']."</option>";
            }
            ?>
           </select>

            
            <label for="Objet">Objet</label>
            <input type="message" name="Objet" placeholder="Entrer votre objet" required>

            <label for="Message">Message</label>
            <textarea type="description" name="Message" placeholder="Entrer votre message" required>


           
            <button type="submit" name="sub">Envoyer</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $id_exp = $_SESSION['id_utilisateur'];
            $date = date('d-m-y h:i:s');
            $dest = $_POST['dest'];
            $objet = $_POST['Objet'];
            $message = $_POST['Message'];
        }
        ?>
        <?php
        if(isset($_POST['sub'])){
            $query = "INSERT INTO `Messages` ( `IdExpediteur`, `IdDestinataire`,`Sujet`,`Contenu`,`DateHeureEnvoi`) VALUES
            ('$id_exp','$dest','$objet','$message','$date')";
              if (mysqli_query($link, $query)) {
                ob_end_clean();
                header('location:boite_envoie.php');
                exit;
            }
            else{
                echo "<h3> votre message n'est pas envoyer  !</h3>";
            }
        }
        mysqli_close($link);
        ?>
    </div>
</body>
</html>