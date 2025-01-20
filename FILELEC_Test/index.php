<?php
ob_start();
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

// Gestion de la connexion
if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $unUser = $unControleur->verifConnexion($email, $mdp);

    if ($unUser) {
        // Stockage des informations utilisateur dans la session
        $_SESSION['email'] = $unUser['email_client'];
        $_SESSION['nom'] = $unUser['nom_client'];
        $_SESSION['prenom'] = $unUser['prenom_client'];
        $_SESSION['id_client'] = $unUser['id_client'];

        header("Location: index.php?page=4"); // Redirige vers le tableau de bord
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
    <link rel="stylesheet" href="assets\css\Nav_bar_index.css">
    <title>Fillelec</title>
</head>
<body>
    <nav>
        <center>
            <h1>Bienvenue sur Fillelec</h1>
            <br>
            <br>
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
            <div class="profile-container">
                <img src="img\profil_logo.png" alt="Profil" class="profile-logo">
                <div class="dropdown">
                    <a href="index.php?page=8">Profil</a>
                    <a href="index.php?page=6">Déconnexion</a>
                </div>
            </div>
        <?php else : ?>
            <div class="link-container">
                <a href="index.php?page=5">Connexion</a>
                <span></span>
            </div>
            <div class="link-container">
                <a href="index.php?page=7">Inscription</a>
                <span></span>
            </div>
        <?php endif; ?>
        </center>
    </nav>

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
                    require_once("controleur/home.php");
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
            case 7:
                // Gestion de l'inscription
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $tab = [
                        'prenom' => htmlspecialchars($_POST['prenom']),
                        'nom' => htmlspecialchars($_POST['nom']),
                        'email' => htmlspecialchars($_POST['email']),
                        'telephone' => htmlspecialchars($_POST['telephone']),
                        'adresse' => htmlspecialchars($_POST['adresse']),
                        'mdp' => htmlspecialchars($_POST['mdp'])
                    ];

                    $unControleur->insertClient($tab);
                }
            case 8:
                require_once("vue/vue_profil.php");
                break;

                // Afficher le formulaire d'inscription
                require_once("vue/vue_inscription.php");
                break;

            default:
                echo "<p>Page introuvable.</p>";
        }
        ?>
    </main>
</body>
</html>

<?php ob_end_flush(); ?>
