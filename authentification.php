<?php
session_start();
include "config.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Vérifier les informations d'identification de l'administrateur
    if ($email === 'admin@gmail.com' && $password === 'admin') {
        // Authentification réussie pour l'administrateur
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'admin'; 
      //  echo "Admin login successful"; // Debug message
      #  var_dump($_SESSION); // Debug session data
        header("location:list_voiture.php");
       
    } else {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':email', $email); // Bind the email parameter
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($user) {
            // If user is found, set session variables
            $_SESSION['email'] = $user->email; // Assuming 'email' is the field name in the database
            $_SESSION['id_user'] = $user->id_user; // Assuming 'id_user' is the field name in the database
            echo "Usuccessfully.";
    }
       
        if(!empty($user) && password_verify($password, $user->password)) {
            // Authentification réussie pour un utilisateur normal
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo "User login successful"; // Debug message
            var_dump($_SESSION); // Debug session data

            header("location:list_voiture_user.php");
            
        } else {
            // Authentification échouée : rediriger vers la page d'accueil avec un message d'erreur
            echo "Login failed"; // Debug message
            header("location:index.php?message=Vérifiez vos paramètres de connexion!");
            exit;
        }
    }
}
?>
