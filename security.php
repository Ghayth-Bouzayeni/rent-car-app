<?php
session_start();

// Vérifie si l'utilisateur est authentifié
if (empty($_SESSION['email']) || empty($_SESSION['password']) || empty($_SESSION['id_user'])) {
    // Déconnexion forcée : redirection vers la page de connexion
    header("location:index.php?message=Veuillez vous connecter pour accéder à cette page.");
    exit;
}

// Vérifie si les informations de session correspondent à un utilisateur authentifié dans la base de données
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id_user'];

?>
