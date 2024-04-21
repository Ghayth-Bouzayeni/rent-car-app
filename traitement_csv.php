<?php
include "config.php";

// Vérifier si un fichier CSV a été correctement soumis
if (!isset($_FILES['csv']) || $_FILES['csv']['error'] !== UPLOAD_ERR_OK) {
    echo "Erreur lors du téléchargement du fichier.";
    exit;
}

// Définir les types de fichiers acceptés
$accept_types = ['text/csv'];

// Nom du fichier et traitement de l'upload
$file_name = upload($_FILES['csv'], "uploads", 2000000, $accept_types); // Taille max en octets (2 Mo)

// Ouvrir le fichier CSV en lecture
$file_path = "uploads/" . $file_name;
$file = fopen($file_path, "r");

if (!$file) {
    echo "Erreur lors de l'ouverture du fichier CSV.";
    exit;
}

// Parcourir chaque ligne du fichier CSV
while (($row = fgetcsv($file, 0, ";")) !== false) {
    // Récupérer les données de la ligne
    $immat = $row[0];
    $marque = $row[1];
    $modele = $row[2];
    $prix = $row[3];
    $etat = $row[4];

    // Vérifier s'il existe déjà une voiture avec le même numéro d'immatriculation
    $sql_check = "SELECT * FROM voitures WHERE immat = :immat";
    $stmt_check = $cnx->prepare($sql_check);
    $stmt_check->bindParam(':immat', $immat);
    $stmt_check->execute();
    $existing_car = $stmt_check->fetch(PDO::FETCH_ASSOC);

    if (!$existing_car) {
        // Insérer une nouvelle voiture
        $sql_insert = "INSERT INTO voitures (immat, marque, modele, prix, etat) VALUES (:immat, :marque, :modele, :prix, :etat)";
        $stmt_insert = $cnx->prepare($sql_insert);
        $stmt_insert->bindParam(':immat', $immat);
        $stmt_insert->bindParam(':marque', $marque);
        $stmt_insert->bindParam(':modele', $modele);
        $stmt_insert->bindParam(':prix', $prix);
        $stmt_insert->bindParam(':etat', $etat);

        if ($stmt_insert->execute()) {
            echo "Voiture insérée avec succès : immatriculation $immat.";
        } else {
            echo "Erreur lors de l'insertion de la voiture : immatriculation $immat.";
        }
    } else {
        echo "La voiture avec l'immatriculation $immat existe déjà.";
    }
}

// Fermer le fichier
fclose($file);

// Redirection avec un message de succès
header("location: forminscrit.php?message=1");
?>
