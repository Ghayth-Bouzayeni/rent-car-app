<?php
// Start or resume session
session_start();

// Include necessary files (config.php)
include_once "config.php";

// Check if the HTTP method is POST (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_voiture = $_POST['id_voiture'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $id_user = $_SESSION['id_user']; // Assuming the user's email is submitted in the form

    // Retrieve user ID from the database based on email (or other identifier)
    


    

        // Prepare and execute the insertion query for reservations
        $sql_insert_reservation = "INSERT INTO reservations (id_voiture, dateDebut, dateFin, id_user) 
                                   VALUES (:id_voiture, :dateDebut, :dateFin, :id_user)";
        $stmt_insert_reservation = $cnx->prepare($sql_insert_reservation);
        $stmt_insert_reservation->bindParam(':id_voiture', $id_voiture);
        $stmt_insert_reservation->bindParam(':dateDebut', $dateDebut);
        $stmt_insert_reservation->bindParam(':dateFin', $dateFin);
        $stmt_insert_reservation->bindParam(':id_user', $id_user); // Bind the 'id_user' parameter
        $stmt_insert_reservation->execute();

        // Update the status of the car to 'Réservée' in the 'voitures' table
        $sql_update_etat = "UPDATE voitures SET etat = 'Réservée' WHERE id_voiture = :id_voiture";
        $stmt_update_etat = $cnx->prepare($sql_update_etat);
        $stmt_update_etat->bindParam(':id_voiture', $id_voiture);
        $stmt_update_etat->execute();

        // Set a session variable to indicate successful reservation
        $_SESSION['reservation_success'] = true;

        // Redirect to a confirmation page after reservation
        header("location: list_voiture_user.php");
        exit;
    }


// Check if reservation was successful and display a success message
if (isset($_SESSION['reservation_success']) && $_SESSION['reservation_success']) {
    echo "<p>Votre réservation a été effectuée avec succès !</p>";

    // Unset the session variable after displaying the message
    unset($_SESSION['reservation_success']);
}
?>
