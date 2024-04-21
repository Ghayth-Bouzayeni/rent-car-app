<?php 

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);
CREATE TABLE voitures (
    id_voiture INT AUTO_INCREMENT PRIMARY KEY,
    immat VARCHAR(255),
    marque VARCHAR(255),
    modele VARCHAR(255),
    prix INT,
    photo VARCHAR(255),
    etat VARCHAR(100)
);
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    id_voiture INT,
    id_user INT,
    FOREIGN KEY (id_voiture) REFERENCES voitures(id_voiture) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);
?>