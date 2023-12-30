

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

nav {
    background-color: rgb(31, 104, 143);
    height:140x;
    color: #fff;
    text-align: center;
    padding: 2.5rem;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
}

nav ul {
    list-style: none;
    margin-top: 80px;
    padding: 0;
    font-weight:bold;
    font-family:sans-serif;
    font-size:1.1rem;
}

nav ul li {
    margin-top:50px;
    display: inline;
    margin-right: 50px;
}

nav ul li a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

nav ul li :hover{
    transition:0.3 ease-in;
    color:whitesmoke;   
    padding: 0px;
    border-bottom: 1px solid #ccc;
 
    
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
    margin: 20px auto;
}

ul {
    
    padding: 0;
    list-style: none;
}

    </style>
</head>
<body>

    <!-- Menu -->
    <nav>
    <h1 style="font-family: serif;font-size: 50px;color: #e0dbdb;">Ensak Events </h1>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="Espace organisation.php">Espace Organisation</a></li>
            <li><a href="Espace administration.php">Espace Administration</a></li>
            <li><a href="calendrier_evenements.html">Calendrier des Événements</a></li>
            <li><a href="About.html">About us</a></li>
            <li><a href="contactus.html">Contactez-nous</a></li>
        </ul>
    </nav>

    <!-- Liste des événements -->
    <div class="container">
        <h2>Liste des Événements</h2>
        <ul>
           
        </ul>
    </div>

</body>
</html>
