<?php
// Inclure les fichiers nécessaires (connexion à la base de données, etc.)
include "config.php";
include "menu.php";

// Récupérer la liste des clients avec réservations
$sql = "SELECT DISTINCT u.id_user, u.email
        FROM users u
        INNER JOIN reservations r ON u.id_user = r.id_user
        INNER JOIN voitures v ON r.id_voiture = v.id_voiture
        WHERE v.etat = 'Réservée'";
$stmt = $cnx->prepare($sql);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients avec Réservations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Clients avec Réservations</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo $client['id_user']; ?></td>
                        <td><?php echo $client['email']; ?></td>
                        <td>
                            <form method="post" action="details_reservations.php">
                                <input type="hidden" name="id_user" value="<?php echo $client['id_user']; ?>">
                                <button type="submit" class="btn btn-primary">Détails</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS et jQuery (doit être inclus avant la fermeture du corps) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
