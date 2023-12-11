<?php
session_start(); 
$link = mysqli_connect("localhost", "root", "", "chat2") or die("Échec de connexion à la base");

// Vous devez récupérer la photo depuis la base de données ou définir une variable $photo avant de l'utiliser.
$photo = $_SESSION['photo'];
$path="photo/$photo";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatting Room</title>
<style>

input[type="text"] {
    width: 100%;
    height:30px;
    padding: 20px;
    margin-top: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    }
input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    padding: 7px;
    width: 10%;
    border: none;
    border-radius: 4px;
    margin-top: 10px; /* Add some margin for spacing */
}
input[type="submit"]:hover {
    background-color: #2980b9;
}

</style>

</head>

<body>
    <form action="liste.php" method="POST">
        <img src="<?php echo $path ;?>" alt="image" height="60" width="60" />
        <h2 style="text-transform:uppercase;"><?php echo "Hello  ".$_SESSION['nom']." ".$_SESSION['prenom']; ?> </h2>
        <div><a href="authentification.php" style="text-decoration:none;color:white;background-color:#87CEEB;padding:5px;border-radius: 6px;">Déconnexion</a></div><br>
        <input style="width:180px;padding:2px;margin-top:20px" type="text" name="mssge" placeholder="Tapez un message">
        <input type="submit" name="sub" value="Envoyer">
    </form>

    <?php
if (isset($_POST['sub'])) {
    $id_usr=$_SESSION['id_user'];
    $msge = $_POST['mssge'];
    $sql1 = "INSERT INTO `messages` (id_user, message) VALUES ('$id_usr', '$msge')";
    mysqli_query($link, $sql1);
    }
    echo "<br><br>";
    echo "<div>";
    
    $sql2 = "SELECT * FROM user, messages WHERE user.id_user=messages.id_user ORDER BY id_message DESC LIMIT 0,10";
    $result1 = mysqli_query($link, $sql2);

    while ($donne = mysqli_fetch_assoc($result1)) {
        echo "<span>" . htmlspecialchars($donne['login']) . " :</span><span>  " . htmlspecialchars($donne['message']) . "</span><br><br>";
    }

    echo "</div>";
    ?>
</body>
</html>
