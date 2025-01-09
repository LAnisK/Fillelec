<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fillelec - Page de connexion</title>
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="stylesheet" href="assets/css/nav_bar_connexion.css">
</head>
<body>
    <div class="welcome-text">
        <h1>Bienvenue sur Fillelec</h1>
    </div>
    <center>
    <br>
    <div>
        <nav>
        <div class="link-container"><a href="index.php?page=1">Accueil</a></div>
        <div class="link-container"><a href="index.php?page=2">À propos</a></div>
        <div class="link-container"><a href="index.php?page=3">Contact</a></div>
        </nav>
    </div>
    
    <div class="login-container">
        <img src="https://via.placeholder.com/100" alt="Logo Fillelec" class="logo">
        <h2>Se connecter à Fillelec</h2>
        <form action="#" method="post">
            <input type="text" class="input-field" placeholder="Nom d'utilisateur" required>
            <input type="password" class="input-field" placeholder="Mot de passe" required>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
    </div>
    </center>
</body>
</html>

