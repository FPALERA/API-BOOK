<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['id'];
    $titre = $_PUT['titre'];
    $auteur = $_PUT['auteur'];
    $annee_publication = $_PUT['annee_publication'];
    $isbn = $_PUT['isbn'];
    $nombre_pages = $_PUT['nombre_pages'];
    $genre = $_PUT['genre'];
    $editeur = $_PUT['editeur'];
    $quantite_en_stock = $_PUT['quantite_en_stock'];

    $stmt = $pdo->prepare("UPDATE livres SET titre = ?, auteur = ?, annee_publication = ?, isbn = ?, nombre_pages = ?, genre = ?, editeur = ?, quantite_en_stock = ? WHERE id = ?");
    $stmt->execute([$titre, $auteur, $annee_publication, $isbn, $nombre_pages, $genre, $editeur, $quantite_en_stock, $id]);
    echo "Livre mis à jour avec succès.";
}
?>
