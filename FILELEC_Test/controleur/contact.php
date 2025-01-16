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