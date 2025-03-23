<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $annee_publication = $_POST['annee_publication'];
    $isbn = $_POST['isbn'];
    $nombre_pages = $_POST['nombre_pages'];
    $genre = $_POST['genre'];
    $editeur = $_POST['editeur'];
    $quantite_en_stock = $_POST['quantite_en_stock'];

    $stmt = $pdo->prepare("INSERT INTO livres (titre, auteur, annee_publication, isbn, nombre_pages, genre, editeur, quantite_en_stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titre, $auteur, $annee_publication, $isbn, $nombre_pages, $genre, $editeur, $quantite_en_stock]);
    echo "Livre ajouté avec succès.";
}
?>
