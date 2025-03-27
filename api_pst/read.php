<?php
require '../config/connexion_db.php';

// Récupérer le nom de l'utilisateur
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nom FROM utilisateurs WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer les livres
$stmt = $pdo->prepare("SELECT livres.*, utilisateurs.nom AS nom_utilisateur FROM livres JOIN utilisateurs ON livres.utilisateur_id = utilisateurs.id");
$stmt->execute();
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($livres) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année de Publication</th>
                    <th>ISBN</th>
                    <th>Nombre de Pages</th>
                    <th>Genre</th>
                    <th>Éditeur</th>
                    <th>Quantité en Stock</th>
                    <th>Ajouté le </th>
                    <th>Ajouté par</th> <!-- Nouvelle colonne -->
                </tr>
            </thead>
            <tbody>";
    
    foreach ($livres as $livre) {
        echo "<tr>
                <td>" . htmlspecialchars($livre['id']) . "</td>
                <td>" . htmlspecialchars($livre['titre']) . "</td>
                <td>" . htmlspecialchars($livre['auteur']) . "</td>
                <td>" . htmlspecialchars($livre['annee_publication']) . "</td>
                <td>" . htmlspecialchars($livre['isbn']) . "</td>
                <td>" . htmlspecialchars($livre['nombre_pages']) . "</td>
                <td>" . htmlspecialchars($livre['genre']) . "</td>
                <td>" . htmlspecialchars($livre['editeur']) . "</td>
                <td>" . htmlspecialchars($livre['quantite_en_stock']) . "</td>
                <td>" . htmlspecialchars($livre['date_ajout']) . "</td>
                <td>" . htmlspecialchars($livre['nom_utilisateur']) . "</td> <!-- Nom de l'utilisateur -->
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun livre disponible.";
}
?>

