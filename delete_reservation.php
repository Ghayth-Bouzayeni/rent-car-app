<?php
include "config.php";

if (isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];

   
        
        $sql_get_car_id = "SELECT id_voiture FROM reservations WHERE id = :reservation_id";
        $stmt_get_car_id = $cnx->prepare($sql_get_car_id);
        $stmt_get_car_id->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
        $stmt_get_car_id->execute();
        $car_id = $stmt_get_car_id->fetchColumn();

        // Supprimer la réservation
        $sql_delete_reservation = "DELETE FROM reservations WHERE id = :reservation_id";
        $stmt_delete_reservation = $cnx->prepare($sql_delete_reservation);
        $stmt_delete_reservation->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
        $stmt_delete_reservation->execute();

        
        $sql_update_car_state = "UPDATE voitures SET etat = 'Non' WHERE id_voiture = :car_id";
        $stmt_update_car_state = $cnx->prepare($sql_update_car_state);
        $stmt_update_car_state->bindParam(':car_id', $car_id, PDO::PARAM_INT);
        $stmt_update_car_state->execute();

        
        header("Location: list_client.php?success=La réservation a été supprimée avec succès");
        
    
} else {
    
    header("Location: list_client.php?error=Paramètre de réservation manquant");
    
}
?>
