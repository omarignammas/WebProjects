<?php 
session_start();
include 'connexion.php';
$login=$_SESSION['login'];
$id=$_SESSION['id_gestionaire'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom']; 
$photo = $_SESSION['photo'];
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
            font-size: 1.2rem;
            text-transform: none;
            border-radius: 8px;
            padding: 2px;
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
                <li><a href="list_etudiants.php">Liste etudiants</a></li>
                <li><a href="list_livres.php">Liste livres</a></li>
                <li><a href="List_emprunts.php">Liste d'emprunts</a></li>
                <li><a href="Ajouter_livre.php">Ajouter livre</a></li>
                <li><a href="Ajouter_etudiant.php">Ajouter etudiant</a></li>
                <li><a href="Ajouter_emprunt.php">Ajouter emprunt</a></li>
                <li><a href="index.php">Se deconnecter</a></li>
            </ul>
        </nav>
    </header>

     <main>
        <section id="demandes-inscription" class="dashboard-container">
        <div class="dashboard-container">'
        <?php echo "<h2> Bonjour    " .$nom." ".$prenom. "</h2>" ?>
        <div class="sec"><h2>Liste des etudiants</h2></div>
    <table border="1">
        <tr>
            <th>Numero Apogee</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Photo</th>
        </tr>
        <?php
        $req3 = "SELECT * FROM etudiant ;";
        $res3 = mysqli_query($link,$req3);
        if (mysqli_num_rows($res3) > 0){
        while($data = mysqli_fetch_assoc($res3)){
            $photo=$data['image'];
            echo "<tr>";
            echo "<td> ".$data['num_apogee']." </td>
            <td> ".$data['nom']." </td>
            <td> ".$data['prenom']." </td>";
            echo "<td>";
            echo "<img src=\"photo/$photo\" alt=\"image\" height=40 width=40 />";
            echo "</td>";
            echo "</tr>";
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


  
    