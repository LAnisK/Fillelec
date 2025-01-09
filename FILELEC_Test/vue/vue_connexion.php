<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fillelec - Page de connexion</title>
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="stylesheet" href="assets/css/nav_bar.css">
</head>
<body>
    <div class="welcome-text">
        <h1>Bienvenue sur Fillelec</h1>
    </div>
    <center>
    <div>
        <nav>
        <div class="link-container"><a href="index.php?page=1">Accueil</a></div>
        <div class="link-container"><a href="index.php?page=2">À propos</a></div>
        <div class="link-container"><a href="index.php?page=3">Contact</a></div>
        <div class="link-container"><a href="index.php?page=7">Inscription</a></div>
        </nav>
    </div>
    
    <div class="login-container">
        <img src="img/Fillelec.jpeg" alt="Logo Fillelec" class="logo">
        <h2>Se connecter à Fillelec</h2>
        <form action="index.php?page=5" method="post">
            <input type="email" class="input-field" name="email" placeholder="Adresse e-mail" required>
            <input type="password" class="input-field" name="mdp" placeholder="Mot de passe" required>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
    </div>
    </center>
</body>
</html>

