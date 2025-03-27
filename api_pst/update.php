<?php
require '../config/connexion_db.php';


$id = $_POST['id'] ?? null;
$titre = $_POST['titre'] ?? null;
$auteur = $_POST['auteur'] ?? null;
$annee_publication = $_POST['annee_publication'] ?? null;
$isbn = $_POST['isbn'] ?? null;
$nombre_pages = $_POST['nombre_pages'] ?? null;
$genre = $_POST['genre'] ?? null;
$editeur = $_POST['editeur'] ?? null;
$quantite_en_stock = $_POST['quantite_en_stock'] ?? null;

if (empty($id)) {
    echo "Erreur : L'ID est requis.";
    exit;
}

// Vérifier si le livre appartient à l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
$stmt->execute([$id]);
$livre = $stmt->fetch();

if (!$livre) {
    echo "Erreur : Aucun livre trouvé avec l'ID spécifié ou vous n'avez pas la permission de le modifier.";
    exit;
}

$fields = [];
$params = [];

// Préparer la requête dynamique
if (!empty($titre)) {
    $fields[] = "titre = ?";
    $params[] = $titre;
}
if (!empty($auteur)) {
    $fields[] = "auteur = ?";
    $params[] = $auteur;
}
if (!empty($annee_publication)) {
    $fields[] = "annee_publication = ?";
    $params[] = $annee_publication;
}
if (!empty($isbn)) {
    $fields[] = "isbn = ?";
    $params[] = $isbn;
}
if (!empty($nombre_pages)) {
    $fields[] = "nombre_pages = ?";
    $params[] = $nombre_pages;
}
if (!empty($genre)) {
    $fields[] = "genre = ?";
    $params[] = $genre;
}
if (!empty($editeur)) {
    $fields[] = "editeur = ?";
    $params[] = $editeur;
}
if (!empty($quantite_en_stock)) {
    $fields[] = "quantite_en_stock = ?";
    $params[] = $quantite_en_stock;
}

// Vérifier si des champs sont à mettre à jour
if (!empty($fields)) {
    // Ajouter l'ID à la fin des paramètres
    $params[] = $id;

    // Construire la requête SQL
    $query = "UPDATE livres SET " . implode(", ", $fields) . " WHERE id = ?";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute($params)) {
        echo "Livre mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du livre.";
    }
} else {
    echo "Aucune donnée à mettre à jour.";
}
?>

