<?php
session_start();
include 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sub'])) {
    
    $Email = mysqli_real_escape_string($link, $_POST['Email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $sql = "SELECT * FROM `Utilisateurs` WHERE Email='$Email';";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        if ($data && $password = $data['MotDePasse']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id_utilisateur'] = $data['IdUtilisateur'];
            $_SESSION['Email'] = $Email;
            $_SESSION['pass'] = $pass;
            $_SESSION['nom'] = $data['Nom'];
            $_SESSION['prenom'] = $data['Prenom'];
            $_SESSION['photo'] = $data['Photo'];
            header('location:boite_reception.php');
            exit;
        } else {
            
            echo "<h2>Votre Email ou password est incorrect</h2>";
        }
    } else {
        die('Error: ' . mysqli_error($link));
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: whitesmoke;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
            font-size: large;
            font-family: 'Poppins', sans-serif;
            
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: serif;
            font-size: large;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;

        }
        p{
            font-family:serif;
        }

        a:hover {
            text-decoration: underline;
        }
        h2{
            font-family: 'Poppins', sans-serif;

        }
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <h2>CONNEXION</h2>
        <label for="Email">Email:</label>
        <input type="text" name="Email" placeholder="Enter your login" required>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <input  style="margin-bottom: 10px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" type="submit" name="sub" value="Se connecter">
        <p>Don't have an account? <a href="compte.php">S'inscrire</a></p>

    </form>
 
</body>
</html>