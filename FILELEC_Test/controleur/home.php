<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <center>
        <br>
        <h1>Bienvenue sur Fillelec</h1>

        <div class="link-container">
            <a href="index.php?page=1">Accueil</a>
            <span></span>
        </div>
        <div class="link-container">
            <a href="index.php?page=2">À propos</a>
            <span></span>
        </div>
        <div class="link-container">
            <a href="index.php?page=3">Contact</a>
            <span></span>
        </div>
    <?php if (isset($_SESSION['email'])) : ?>
        <div class="link-container">
            <a href="index.php?page=4">Tableau de bord</a>
            <span></span>
        </div>
        <div class="link-container">
            <a href="index.php?page=6">Déconnexion</a>
            <span></span>
        </div>
    <?php else : ?>
        <div class="link-container">
            <a href="index.php?page=5">Connexion</a>
            <span></span>
        </div>

        <div class="link-container">
            <a href="index.php?page=7">Inscription</a>
            <span></span>
        <div>
            
    <?php endif; ?>
    </center>
    </nav>

    <p></p>
    <script> src="assets\js\index.js" </script>
    <div class="carrousel-container">
        <div class="carrousel-images">
            <img src="img\meca-distribution-vente-piece-detachee-automobile-grasse-realisations01.webp" alt="Image 1">
            <img src="img\pieces-auto-vigneux.jpg" alt="Image 2">
            <img src="img\Vente-de-pieces-detachees-carrosserie-et-mecanique-pour-voiture.jpeg" alt="Image 3">
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>

    <div class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <center>
    <div class="link-container">
    <a href="index.php?page=2">Offre du moment</a>
    <span></span>
    </center>

    <br>
    <br>
    <br>
    <br>
</body>
</html>
