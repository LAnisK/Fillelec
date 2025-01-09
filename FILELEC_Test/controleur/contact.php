<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/nav_bar.css">
</head>
<body>
<div>
        <nav>
        <div class="link-container"><a href="index.php?page=1">Accueil</a></div>
        <div class="link-container"><a href="index.php?page=2">À propos</a></div>
        <div class="link-container"><a href="index.php?page=3">Contact</a></div>
        <div class="link-container"><a href="index.php?page=7">Inscription</a></div>
        </nav>
    </div>
</body>
</html>

<?php


require_once "vue/vue_insert_contact.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    
    $model->saveContact($nom, $email, $message);

    
    header("Location: controleur/home.php");
    exit(); 
} else {
   
    require_once "controleur/contact.php";
}
?>