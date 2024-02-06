    <?php 
    if(isset($_COOKIE['pseudo'])){
        header("Location:Qcm.php");
        exit;
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['pseudo'])){
    $temp=3000;
    setcookie('pseudo',$_POST['pseudo'],time()+$temp);
    header("location:Qcm.php");
    exit;
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecter</title>
</head>
<body>
    <form action="index.php" method="POST">
    <input type="text" name="pseudo">
    <input  style="width: 150px;text-transform: uppercase;" type="submit" name="connecter">
    </form>
</body>
</html>