<?php
ob_start();
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

// Gestion de la connexion
if (isset($_POST['Connexion'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $unUser = $unControleur->verifConnexion($email, $mdp);
    if ($unUser) {
        $_SESSION['email'] = $unUser['email'];
        $_SESSION['nom'] = $unUser['nom'];
        $_SESSION['prenom'] = $unUser['prenom'];
        $_SESSION['role'] = $unUser['role'];
        header("Location: index.php?page=5");
        exit();
    } else {
        $error = "Identifiants incorrects. Veuillez réessayer.";
    }
}

// Gestion de la déconnexion
if (isset($_GET['page']) && $_GET['page'] == 6) {
    session_destroy();
    unset($_SESSION['email']);
    header("Location: index.php?page=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fillelec</title>
    <link rel="stylesheet" href="assets/css/home.css">
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
        <?php endif; ?>
    </center>
    </nav>

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

    <main>
        <?php
        // Déterminer la page à afficher en fonction du paramètre 'page' dans l'URL
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1; // Par défaut, afficher la page d'accueil
        }

        // Inclusion conditionnelle des pages en fonction de la variable 'page'
        switch ($page) {
            case 1:
                require_once("controleur/home.php");
                break;
            case 2:
                require_once("controleur/about.php");
                break;
            case 3:
                require_once("controleur/contact.php");
                break;
            case 4:
                if (isset($_SESSION['email'])) {
                    require_once("controleur/dashboard.php");
                } else {
                    echo "<p>Veuillez vous connecter pour accéder au tableau de bord.</p>";
                }
                break;
            case 5:
                // Si l'utilisateur n'est pas connecté, afficher la page de connexion
                if (! isset($_SESSION['email'])) {
                    if (isset($error)) {
                        echo "<p style='color:red;'>$error</p>";
                    }
                    require_once("vue/vue_connexion.php");
                } else {
                    echo "<p>Vous êtes déjà connecté.</p>";
                }
                break;
            default:
                echo "<p>Page introuvable.</p>";
        }
        ?>
    </main>
    <script> src="assets\js\index.js" </script>
</body>
</html>

<?php ob_end_flush(); ?>

