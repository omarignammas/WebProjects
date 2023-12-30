<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'Administration </title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.dashboard-container {
    max-width: 1000px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,td {
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
    <form action="admin.php" method="POST">
    <div class="dashboard-container">
        <h2>Les demandes d'organisation</h2>
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


$conn=mysqli_connect($servername, $username, $password, $dbname); 

if (!$conn){
    die("Échec de la connexion à la base de données : " . mysqli_connect_error($conn));
}

$sql = "SELECT * FROM demande_organisations";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['nom_org']}</td>";
        echo "<td>{$row['Type']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['nom_resp']}</td>";
        echo "<td>{$row['prenom_resp']}</td>";
        echo "<td>{$row['CIN_resp']}</td>";
        echo "<td><button href='verification.php?id={$row['email']}'>Validate</button></td>";
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
  
    
