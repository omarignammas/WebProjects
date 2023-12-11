<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichge</title>
</head>
<body>
    <table border="1" cellspacing="0" cellspadding="3">
    <tr>
        <th>Numero d'appogee</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Photo</th>
    </tr>
    <?php
    include('connexion.php');
    $requette="SELECT * FROM etudiant";
    $resultat=mysqli_query($link,$requette);
    while($data=mysqli_fetch_assoc($resultat)){
        $numap=$data['num_apogee'];
        $nom=$data['nom'];
        $prenom=$data['prenom'];
        $photo=$data['photo'];
        echo "<tr>";
        echo "<td>$numap</td>";
        echo "<td>$nom</td>";
        echo "<td>$prenom</td>";
        echo "<td>";
        echo "<img src=\"photo/$photo\" alt=\"image\" height=40 width=40 />";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>