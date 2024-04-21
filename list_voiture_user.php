
<?php
include "config.php"; // 
include "menu_user.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
<body>

<div class="container">
    <h1>Liste des voitures disponibles</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Immatriculation</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Prix (DT)</th>
                <th>État</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM voitures WHERE etat = 'Non'";
            $voitures = $cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);

            foreach ($voitures as $voiture) {
                $photo = !empty($voiture->photo) ? 'profils/' . $voiture->photo : 'profils/default.jpg';

                echo "
                <tr>
                    <td><img src='$photo' width='100'></td>
                    <td>$voiture->immat</td>
                    <td>$voiture->marque</td>
                    <td>$voiture->modele</td>
                    <td>$voiture->prix</td>
                    <td>$voiture->etat</td>
                    <td>
                        <button onclick='showReservationForm($voiture->id_voiture)' class='btn btn-primary'>Louer</button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>

  

<!-- Formulaire de Réservation dans le style Bootstrap -->
<div id="reservationForm" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Réserver cette voiture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="reservation.php" enctype="multipart/form-data">

        <!-- Champ caché pour l'identifiant de la voiture -->
        <input type="hidden" id="id_voiture" name="id_voiture">
            
        <div class="modal-body">
          <!-- Champ Date de début de location -->
          <div class="mb-3">
            <label for="dateDebut" class="form-label">Date de début de location :</label>
            <input type="date" class="form-control" id="dateDebut" name="dateDebut" required>
          </div>

          <!-- Champ Date de fin de location -->
          <div class="mb-3">
            <label for="dateFin" class="form-label">Date de fin de location :</label>
            <input type="date" class="form-control" id="dateFin" name="dateFin" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-success">Réserver</button>
        </div>

      </form>
    </div>
  </div>
</div>


<script>
   function showReservationForm(id_voiture) {
    document.getElementById('id_voiture').value = id_voiture;
    var myModal = new bootstrap.Modal(document.getElementById('reservationForm'));
    myModal.show();
}

</script>
