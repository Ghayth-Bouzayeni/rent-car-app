<?php
 // Include your database connection
include "menu_user.php"; // Include your user menu file if needed

include "authentification.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de vos Locations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

<div class="container">
    <h1>Liste de vos Locations</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Immatriculation</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Prix (DT)</th>
                <th>datede</th>
                <th>datefin</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id_user=$_SESSION["id_user"];  
            $sql = "SELECT r.*, v.immat, v.marque, v.modele, v.prix, v.photo
        FROM reservations r
        INNER JOIN voitures v ON r.id_voiture = v.id_voiture
        WHERE r.id_user = :id_user AND v.etat = 'Réservée'";

$stmt = $cnx->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->execute();

// Récupérer toutes les réservations de l'utilisateur avec les détails des voitures associées
$reservations = $stmt->fetchAll(PDO::FETCH_OBJ);
          
            
   
       
           foreach ($reservations as $reservation) {

               
                $photo = !empty($reservation->photo) ? 'profils/' . $reservation->photo : 'profils/default.jpg';

                echo "
                <tr>
                    <td><img src='$photo' width='100'></td>
                    <td>$reservation->immat</td>
                    <td>$reservation->marque</td>
                    <td>$reservation->modele</td>
                    <td>$reservation->prix</td>
                    <td>$reservation->dateDebut</td>
                    <td>$reservation->dateFin</td>

                   
                    <td>
                        <button onclick='showReservationForm($reservation->id_voiture, \"$reservation->dateDebut\", \"$reservation->dateFin\")' class='btn btn-primary'>Modifier DATE</button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>

    <!-- Reservation Form Modal -->
    <div id="reservationForm" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Date de fin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="update_user_loc.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="id_voiture" name="id_voiture">
                        <div class="mb-3">
                            <label for="dateFin" class="form-label">Date de fin de location :</label>
                            <input type="date" class="form-control" id="dateFin" name="dateFin" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle modal display -->
    <script>
        function showReservationForm(id_voiture, dateDebut, dateFin) {
            document.getElementById('id_voiture').value = id_voiture;
            document.getElementById('dateFin').value = dateFin;

            var myModal = new bootstrap.Modal(document.getElementById('reservationForm'));
            myModal.show();
        }
    </script>
</div>

</body>
</html>

