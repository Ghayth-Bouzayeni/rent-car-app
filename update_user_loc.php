<?php

include "config.php";


if (isset($_POST['id_voiture']) && isset($_POST['dateFin'])) {
    
    $reservationId = $_POST['id_voiture'];
    $newDateFin = $_POST['dateFin'];

    
    $sql = "UPDATE reservations SET dateFin = :newDateFin WHERE id_voiture = :reservationId";

    
    $stmt = $cnx->prepare($sql);

    
    $stmt->bindParam(':newDateFin', $newDateFin, PDO::PARAM_STR);
    $stmt->bindParam(':reservationId', $reservationId, PDO::PARAM_INT);

    
    $result = $stmt->execute();

    
    if ($result) {
        
        header("Location: list_location.php?message=Date de fin mise à jour avec succès");
       
        
    } else {
        
        echo "Erreur lors de la mise à jour de la date de fin de réservation.";
    }
} else {
    
    header("Location: list_location.php?message=Erreur lors de la mise à jour de la date de fin de réservation");
    exit();
}
?>
