<?php
require '../config/connexion_db.php';
 session_start();

// Vérifier si l'utilisateur est connecté
 if (!isset($_SESSION['user_id'])) {
  header("Location: ../login/login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'] ?? '';
    $auteur = $_POST['auteur'] ?? '';
    $annee_publication = $_POST['annee_publication'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $nombre_pages = $_POST['nombre_pages'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $editeur = $_POST['editeur'] ?? '';
    $quantite_en_stock = $_POST['quantite_en_stock'] ?? '';

    if (!empty($titre) && !empty($auteur) && !empty($annee_publication) && !empty($isbn) && !empty($nombre_pages) && !empty($quantite_en_stock)) {
        
        // Récupérer tous les IDs existants
        $stmt = $pdo->prepare("SELECT id FROM livres");
        $stmt->execute();
        $idsExistants = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Trouver le premier ID libre
        $nouvelID = 1;
        while (in_array($nouvelID, $idsExistants)) {
            $nouvelID++;
        }

        // Insérer le livre avec le nouvel ID
        $stmt = $pdo->prepare("INSERT INTO livres (id, titre, auteur, annee_publication, isbn, nombre_pages, genre, editeur, quantite_en_stock, utilisateur_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nouvelID, $titre, $auteur, $annee_publication, $isbn, $nombre_pages, $genre, $editeur, $quantite_en_stock, $_SESSION['user_id']])) {
            echo "Livre ajouté avec succès avec l'ID: $nouvelID.";
        } else {
            echo "Erreur lors de l'ajout du livre.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
} else {
    echo "Méthode de requête non autorisée. Utilisez POST.";
}
?>

