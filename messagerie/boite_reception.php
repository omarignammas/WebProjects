<?php 
session_start();
include 'connexion.php';
$login=$_SESSION['Email'];
$id=$_SESSION['id_utilisateur'];
$photo = $_SESSION['photo'];
$Nom=$_SESSION['nom'];
$Prenom=$_SESSION['prenom']; 
$path= "photo/$photo";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 1.2em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
        }

        nav {
            
            padding: 1.5em;
            
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        nav ul li {
            display: inline;
            margin-right: 80px;
            font-size: 1.2rem;
            text-transform: none;
            border-radius: 8px;
            padding: 11px;
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
        
        table {
         width: 80%;
         margin:10%;
         border-collapse: collapse;
         margin-top: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        button {
         background-color: #2ecc71;
         color: #fff;
         border: none;
         padding: 8px 12px;
         border-radius: 4px;
         cursor: pointer;
        }

         button:hover {
         background-color: #27ae60;
        }

        .sec{
            background-color:#3498db;
            color:black;
        }
        img{
            align-items:center;
            margin-left:48%;
        }

        h2{
         text-align: center;
         font-family: serif;
         font-size: 2.1rem;
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

     <main>
        <section id="demandes-inscription" class="dashboard-container">
        <div class="dashboard-container">'
        <?php echo "<h2> Bonjour    " .$Nom." ".$Prenom. "</h2>" ?>
        <img src="<?php echo $path ;?>" alt="image" height="70" width="70" />
        <div class="sec"><h2>Boite de Reception</h2></div>
    <table border="1">
        <tr>
            <th>Expediteur</th>
            <th>Objet</th>
            <th>Message</th>
        </tr>
        <?php
        $req3 = "SELECT * FROM Messages WHERE IdDestinataire = $id ;";
        $res3 = mysqli_query($link,$req3);
        if (mysqli_num_rows($res3) > 0){
        while($data = mysqli_fetch_assoc($res3)){
            $id_exp=$data['IdExpediteur'];
            $req = "SELECT * FROM `Utilisateurs` WHERE IdUtilisateur=$id_exp;";
            $res = mysqli_query($link,$req);
            $rp = mysqli_fetch_assoc($res);
            echo "<tr>";
            echo "<td> ".$rp['Nom']." ".$rp['Prenom']."</td>
            <td> ".$data['Sujet']." </td>
            <td> ".$data['Contenu']." </td>";
            echo "</tr>";
        }
    }
    else {
        echo "<tr><td colspan='8'>No messages found.</td></tr>";
    }
        ?>
    </table>
    </div>
    </form>
</body>
</html>


  
    