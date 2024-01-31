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
                <li><a href="list_etudiants.php">Liste etudiants</a></li>
                <li><a href="list_livres.php">Liste list_livres</a></li>
                <li><a href="List_emprunts.php">Liste d'emprunts</a></li>
                <li><a href="Ajouter_livre.php">Ajouter livre</a></li>
                <li><a href="Ajouter_etudiant.php">Ajouter etudiant</a></li>
                <li><a href="Ajouter_emprunt.php">Ajouter emprunt</a></li>
            </ul>
        </nav>
    </header>

     <main>
        <section class="dashboard-container">
        <div class="dashboard-container">'
        <?php echo "<h2> Bonjour    " .$nom." ".$prenom. "</h2>" ?>

    </table>
    </div>
    </form>
</body>
</html>