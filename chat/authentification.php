<?php
session_start();
$conn=mysqli_connect("localhost","root","","chat2") or die("echec de connexion a la base");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $login=$_POST['login'];
    $pass=$_POST['password'];
  $QUERY="SELECT * FROM user WHERE  login = '$login' ";     //Requete sql
  $resultat=mysqli_query($conn,$QUERY);                    //execution de la requete dans la base donnee 
 
   if (mysqli_num_rows($resultat) > 0){
    $data=mysqli_fetch_assoc($resultat);
    if($pass == $data['pass']){
         $_SESSION['loggedin']=true;
         $_SESSION['id_user']=$data['id_user'];
         $_SESSION['login']=$data['login'];
         $_SESSION['nom']=$data['nom'];
         $_SESSION['prenom']=$data['prenom'];
         $_SESSION['photo']=$data['photo'];
    header('location:liste.php');
    exit;
    }else{
        echo "incorrect password";
    }

   }else{
    echo "incorrect login";
   }
   mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
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
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    </style>
</head>
<body>
    <form action="" method="post">
        <h2 style="font-family:serif;font-size:25px;">Se connecter a votre compte organisation</h2>
        <label for="login">Login:</label>
        <input type="text" name="login" placeholder="Enter your login">

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password">

        <input type="submit" name="sub" value="Connexion">

        <p>Don't have an account? <a href="index.php">Sign up</a></p>
    </form>
</body>
</html>
