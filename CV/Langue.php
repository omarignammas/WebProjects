<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>langues</title>
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

        .input {
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
        <label for="langue">Langue</label>
        <select class ="input"  name="langue" required>
        <?php
        $re = " SELECT `libelle_langue` FROM langue " ;
        $resultat = mysqli_query($link,$re);
        while($data = mysqli_fetch_assoc($resultat)){
            echo"<option value=".$data['libelle_langue'].">".$data['libelle_langue']."</option>";
        }
        ?>
        </select>
        <br>
        <label for="niveau">Niveau</label>
        <select class ="input" name="niveau" required>
        <?php
        $re = " SELECT `niveau` FROM user_langue " ;
        $resultat = mysqli_query($link,$re);
        while($data = mysqli_fetch_assoc($resultat)){
            echo"<option value=".$data['niveau'].">".$data['niveau']."</option>";
        }
        ?>
        </select>

        <input  class="input"  type="submit" name="sub" value="ajouter">
    </form>
 
</body>
</html>
<?php 
$id=$_SESSION['id_user'];
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['sub'])){
    $lan = $_POST['langue'];
    $niv = $_POST['niveau'];
    $cl = "SELECT * FROM langue WHERE libelle_langue = '$lan'";
    $cl = mysqli_query($link,$cl);
    $tab = mysqli_fetch_assoc($cl); 
    $req="SELECT * from user_langue where id_user = $id ";
    $res = mysqli_query($link,$req);
    $idl = $tab['id_langue'];
    $data = mysqli_fetch_assoc($res);
    if($idl != $data['id_langue']){
        $r1 = "INSERT INTO `user_langue` (`id_langue`,`id_user`,`niveau`) VALUES ($idl,$id,'$niv') ";
        $r = mysqli_query($link,$r1);
        header('location: moncv.php');
        exit;
    }
    else{
        echo "Cette langue deja existe !!!";
    }
}
mysqli_close($link);
?>
