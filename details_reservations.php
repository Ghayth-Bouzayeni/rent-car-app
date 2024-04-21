<?php
include "config.php";
include "menu.php";

if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];

  
    $sql = "SELECT r.id, r.dateDebut, r.dateFin, v.marque, v.immat
            FROM reservations r
            INNER JOIN voitures v ON r.id_voiture = v.id_voiture
            WHERE r.id_user = :id_user and v.etat = 'Réservée'";

    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails des Réservations</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Détails des Réservations pour l'utilisateur ID: <?php echo $id_user; ?></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Réservation</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Marque</th>
                        <th>Immatriculation</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?php echo $reservation['id']; ?></td>
                            <td><?php echo $reservation['dateDebut']; ?></td>
                            <td><?php echo $reservation['dateFin']; ?></td>
                            <td><?php echo $reservation['marque']; ?></td>
                            <td><?php echo $reservation['immat']; ?></td>
                            <td>
                                <form method="post" action="delete_reservation.php">
                                    <input type="hidden" name="reservation_id" value="<?php echo $reservation['id']; ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="list_client.php" class="btn btn-primary">Retour à la liste des clients</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
} else {
   
    header("Location: list_client.php");
    exit();
}
?>
