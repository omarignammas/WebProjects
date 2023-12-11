
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
            <h1 style="font-family: serif;font-size: 50px;color: #e0dbdb;">Espace Organisation </h1>
            <ul>
                <li><a href="#Page_Acceuil">Acceuil</a></li>
                <li><a href="#modification">Ajouter un evenement</a></li>
                <li><a href="#modification">Demandes de Modification</a></li>
                <li><a href="#evenements-organisees">Événements Organisés</a></li>
                <li><a href="promotion.html">Demandes d'Organisation d'Événement</a></li>
            </ul>
        </nav>
    </header>

     <main>
        <section id="demandes-inscription" class="dashboard-container">
        <div class="dashboard-container">
        <h2 >Les evenements organises</h2>
        <table>
            <thead >
                <tr>
                    <th>Email</th>
                    <th>Organization Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>nom responsable</th>
                    <th>prenom responsable</th>
                    <th>CIN responsable</th>
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
$sql = "SELECT * FROM demande_organisations";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row= mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['nom_org']}</td>";
        echo "<td>{$row['Type']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['nom_resp']}</td>";
        echo "<td>{$row['prenom_resp']}</td>";
        echo "<td>{$row['CIN_resp']}</td>";
        echo "<td>";
        echo "<form action='Envoyer_compte.php' method='POST'>";
        echo "<input type='hidden' name='id' value='{$row['email']}'>";
        echo "<button type='submit' name='valider'>Valider</button>";
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


  
    