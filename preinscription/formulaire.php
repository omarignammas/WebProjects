<?php
session_start();
include "connexion.php"
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['sub'])) {
    $cne = $_POST['cne'];

    $_SESSION['cne'] = $_POST['cne'];
    $res = "SELECT * FROM `etudiants` where cne = $cne ";
    $result = mysqli_query($link,$res);
    if(mysqli_num_rows($result)!= 0){
        $data = mysqli_fetch_assoc($result);
        $nom = $data['nom'];
        $prenom = $data['prenom'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset='utf-8' />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #95a5a6;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
        }

        form {
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            text-align: left;
            font-family: serif;
            font-size: medium;
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        
        .barre {
               font-weight: bold;
                margin-top: 20px;
                padding:8px;
                color:black;
                background-color:skyblue;
                margin-top: 15px;
                margin-bottom: 15px;
        }
        button {
            background-color: #95a5a6;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #657576;
        }
        </style>
</head>
<body>

        <form action="confirmation.php" method="post" class="formulaire">
            <div class="barre">Etudiant</div>
            <div class="input">
                <label>CNE</label>
                <input type="text" name="cne"  value = <?php echo $cne ; ?> readonly/>
            </div>
            <div class="input">
                <label>Nom et Prénom</label>
                <input type="text" name="nom1" value=<?php echo $nom ; echo $prenom ;?> readonly/>
            </div>
            <div class="barre">Etat civil</div>
            <div class="input">
                <label>Nom</label>
                <input type="text" name="nom" />
            </div>
            <div class="input">
                <label>Prénom</label>
                <input type="text" name="prenom"  />
            </div>
            <div class="input">
                <label>CNE</label>
                <input type="text" name="cne"  value = <?php echo $cne ; ?> readonly/>
            </div>
            <div class="input">
                <label>Sexe</label>
                <select name="sexe">
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="input">
                <label>Situation familiale</label>
                <select name="situation">
                    <option value="default" selected="selected">Choisissez</option>
                    <option value="marie">Marié</option>
                    <option value="celibataire">Célibataire</option>
                </select>
            </div>

            <div class="barre">Naissance</div>
            <div class="input">
                <label>Date de naissance</label>
                <input type="date" name="date_naissance" >
            </div>
            <div class="input">
                <label>Ville de naissance</label>
                <select name="ville_naissance" id="vn">
                    <?php
                        $requette = "SELECT `lib_pro` FROM `province`";
                        $q1 = mysqli_query($link,$requette);
                        while ($data1 = mysqli_fetch_assoc($q1)) {
                            echo "<option value=".$data1['lib_pro'].">".$data1['lib_pro']."</option><br>";
                        }
                    ?>
                </select>
            </div>

            <div class="barre">Adresse</div>
            <div class="input">
                <label>Adresse</label>
                <input type="text" name="adr" >
            </div>
            <div class="input">
                <label>Province/Pays</label>
                <select name="province">
                <?php
                        $requette = "SELECT `lib_pro` FROM `province`";
                        $sql = mysqli_query($link,$requette);
                        while ($data = mysqli_fetch_assoc($sql)) {
                            echo "<option value=".$data['lib_pro'].">".$data['lib_pro']."</option><br>";
                        }
                    ?>
                </select>
            </div>
            <div class="input">
                <label>Téléphone</label>
                <input type="text" name="telef" value="" maxlength="10">
            </div>

            <div class="barre">Bac</div>
            <div class="input">
                <label>Série bac</label>
                <select name="serie">
                <?php
                        $req = "SELECT `lib_bac` FROM `bac`";
                        $sql1 = mysqli_query($link,$req);
                        while ($row = mysqli_fetch_assoc($sql1)) {
                            echo "<option value=".$row['lib_bac'].">".$row['lib_bac']."</option><br>";
                        }
                    ?>
                </select>
            </div>
            <div class="input">
                <label>Mention</label>
                <select name="mention">
                    <?php
                        $req1 = "SELECT `lib_men` FROM `mention`";
                        $sql2 = mysqli_query($link,$req1);
                        while ($data3 = mysqli_fetch_assoc($sql2)) {
                            echo "<option value=".$data3['lib_men'].">".$data3['lib_men']."</option><br>";
                        }
                    ?>
                </select>
            </div>
            <div class="input">
                <label>Année</label>
                <select name="annee">
                   
                </select>
            </div>
            <div class="input">
                <label>Etablissement</label>
                <select name="etab">
                <?php
                        $req3 = "SELECT `lib_etb` FROM `etablissement`";
                        $sql3 = mysqli_query($link,$req3);
                        while ($datab = mysqli_fetch_assoc($sql3)) {
                            echo "<option value=".$datab['lib_etb'].">".$datab['lib_etb']."</option><br>";
                        }
                    ?>
                </select>
            </div>
            <div class="barre">Photo</div>
            <div class="input">
                <label>Deposez votre photo</label>
                <input type="file" name="photo">
            </div>
            <h5>Verifiez bien votre formulaire avant de cliquer sur s'inscrire</h5>
            <div class="input">
                <input type="submit" name="sub" value="S'inscrire"/>
            </div>
        </form>

</body>
<?php
}
    else{
        echo "votre CNE est incorrect";
        echo "<a href='index.php'>fait un reconexion</a>";
    }
}
else{
    header("index.php");
    exit;
};
?>
</html>
