<?php 
session_start();
include 'connexion.php';
$login=$_SESSION['login'];
$id=$_SESSION['id_user'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom']; 
$photo = $_SESSION['photo'];
$path="photo/$photo";
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
            padding: 1em;
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
            margin-right: 60px;
            font-size: 1.4rem;
            text-transform: none;
            border-radius: 8px;
            padding: 5px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
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
         width: 100%;
         border-collapse: collapse;
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
                <li><a href="moncv.php">Mon CV</a></li>
                <li><a href="formation.php">Ajouter une formation</a></li>
                <li><a href="experience.php">Ajouter une experience</a></li>
                <li><a href="Langue.php">Ajouter une langue</a></li>
                <li><a href="index.php">Se deconnecter</a></li>
            </ul>
        </nav>
    </header>

     <main>
        <section id="demandes-inscription" class="dashboard-container">
        <div class="dashboard-container">'
        <?php echo "<h2> Bonjour    " .$nom." ".$prenom. "</h2>" ?>
        <img style="margin-left:48%;" src="<?php echo $path ;?>" alt="profil image" height="70" width="70" />

        <div class="sec"><h2>Experience</h2></div>
        <table  border="1">
        <tr>
            <th>Periode d'experience</th>
            <th>Experience</th>
            <th>Description de l'experience</th>
        </tr>
        <?php
        $req1 = "SELECT * from experience where id_user = $id ";
        $res1 = mysqli_query($link,$req1);
        
if (mysqli_num_rows($res1) > 0){
        while($data = mysqli_fetch_assoc($res1)){
            echo "<tr>
            <td> ".$data['periode_experience']." </td>
            <td> ".$data['libelle_experience']." </td>
            <td> ".$data['description_experience']." </td>
            </tr>";
        }
    }
        else {
            echo "<tr><td colspan='8'>No experience registration requests found.</td></tr>";
        }
        ?>
    </table >
    <div class="sec"><h2>Formation</h2></div>
    <table  border="1">
        <tr>
            <th>Periode de formation</th>
            <th>Formation</th>
            <th>Description de la Formation</th>
        </tr>
        <?php
        $req2 = "SELECT * from formation where id_user = $id ";
        $res2 = mysqli_query($link,$req2);
        if (mysqli_num_rows($res2) > 0){
        while($data = mysqli_fetch_assoc($res2)){
            echo "<tr>
            <td> ".$data['periode_formation']." </td>
            <td> ".$data['libelle_formation']." </td>
            <td> ".$data['description_formation']." </td>
            </tr>";
        }
    }
    else {
        echo "<tr><td colspan='8'>No formation registration requests found.</td></tr>";
    }
        ?>
    </table >
    <div class="sec"><h2>Langues</h2></div>
    <table border="1">
        <tr>
            <th>Langue</th>
            <th>Niveau</th>
        </tr>
        <?php
        $req3 = "SELECT langue.libelle_langue  , user_langue.niveau FROM user_langue INNER JOIN langue ON langue.id_langue = user_langue.id_langue AND user_langue.id_user = $id ";
        $res3 = mysqli_query($link,$req3);
        if (mysqli_num_rows($res3) > 0){
        while($data = mysqli_fetch_assoc($res3)){
            echo "<tr>
            <td> ".$data['libelle_langue']." </td>
            <td> ".$data['niveau']." </td>
            </tr>";
        }
    }
    else {
        echo "<tr><td colspan='8'>No language registration requests found.</td></tr>";
    }
        ?>
    </table>
    </div>
    </form>
</body>
</html>


  
    