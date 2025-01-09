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
        header("Location: index.php?page=1");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fillelec</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur Fillelec</h1>
        <nav class="navigation">
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
        </nav>
    </header>

    <main>
        <?php
        // Déterminer la page à afficher en fonction du paramètre 'page' dans l'URL
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Inclusion conditionnelle des pages en fonction de la variable 'page'
        switch ($page) {
            case 1:
                require_once("controleur/home.php");
                break;
            case 2:
                require_once("controleur/apropos.php");
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
                if (!isset($_SESSION['email'])) {
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
    </main