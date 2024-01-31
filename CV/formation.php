<?php
session_start();
include 'connexion.php';
$id = $_SESSION['id_user'];
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $periode = $_POST['periode'];
    $formation = $_POST['formation'];
    $Description = $_POST['Description'];
    $req="SELECT * from formation where id_user = $id ";
    $query = mysqli_query($link,$req);
    $data = mysqli_fetch_assoc($query);
        $req = "INSERT INTO `formation` (`id_user`,`periode_formation`,`libelle_formation`,`description_formation`) VALUES ($id,'$periode','$formation','$Description') ";
        if( mysqli_query($link,$req)){
        header('location: moncv.php');
        exit;
    }
    else{
        die('Error: '. mysqli_error($link));
    }
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            font-family: serif;
            
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
            font-family: serif;
        }
    </style>
</head>
<body>

    <form action="" method="POST">

        <label for="periode">periode de la formation</label>
        <input type="text" name="periode" required >

        <label for="Formation">Formation</label>
        <input type="text" name="formation" required>

        <label for="Description">Description de la formtion</label>
        <input type="text" name="Description" required>

        <input  style="margin-bottom: 10px;" type="submit" name="sub" value="ajouter">

    </form>
 
</body>
</html>