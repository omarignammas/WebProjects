
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgb(31, 104, 143);
            color: #fff;
            text-align: center;
            padding: 1em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
        }

        nav {
            
            padding: 1em;
            
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
            font-size: 1.1rem;
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
         color: #221e1e;
         font-weight:bold ;
        }
        
        table {
         width: 94%;
         margin:3%;
         border-collapse: collapse;
         margin-top: 20px;
         box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
         
         
        }

        th, td {
         padding: 14px;
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
            <h1 style="font-family: serif;font-size: 50px;color: #e0dbdb;">Espace Administration </h1>
            <ul>
                <li><a href="home.php">Acceuil</a></li>
                <li><a href="Espace administration.php">Demandes d'inscription</a></li>
                <li><a href="#demandes-modification">Demandes de Modification</a></li>
                <li><a href="#evenements-organises">Événements Organisés</a></li>
                <li><a href="#demandes-organisation-evenement">Demandes d'Organisation d'Événement</a></li>
            </ul>
        </nav>
    </header>

     <main>
        <section id="demandes-inscription" class="dashboard-container">
        <div class="dashboard-container">
        <h2 >Les demandes d'organisation des ev&eacutenements</h2>
        <table>
            <thead >
                <tr>
                    <th>Organization Name</th>
                    <th>Email d'organisation</th>
                    <th>Description</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Nombre places</th>
                    <th>Stand</th>
                    <th>Payant</th>
                    <th>Type</th>
                    <th>Sponsoring</th>
                    <th>Acceptation des demandes</th>
                </tr>
            </thead>
            <tbody>
            <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ensak_Events";


$conn=mysqli_connect($servername, $username, $password,$dbname); 

if (!$conn){
    die("Échec de la connexion à la base de données : " . mysqli_connect_error($conn));
}
$sql = "SELECT * FROM depose_evenement";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row= mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['nom_org']}</td>";
        echo "<td>{$row['email_org']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['lieu']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['nbr_place']}</td>";
        echo "<td>{$row['stand']}</td>";
        echo "<td>{$row['payant']}</td>";
        echo "<td>{$row['type']}</td>";
        echo "<td>{$row['sponsoring']}</td>";
        echo "<td>";
        echo "<button type='submit' name='Accepter' style='margin:3%;'><a href='verification_evenement.php'style='color:white;'>Accepter</a></button> <button type='submit' name='Refuser'><a href='verification_evenement.php' style='color:white;'>Refuser</a></button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No registration requests found.</td></tr>";
}
?> 
            </tbody>
        </table>
    </div>
    </form>
</body>
</html>


  
    