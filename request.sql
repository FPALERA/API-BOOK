#creer la base de données "gestion_livres"

CREATE DATABASE gestion_livres;

#créer les tables "livres" et "utilisateurs"

CREATE TABLE livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    annee_publication INT NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    nombre_pages INT NOT NULL,
    genre VARCHAR(100),
    editeur VARCHAR(100),
    quantite_en_stock INT NOT NULL,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    utilisateur_id INT
);

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL
);



