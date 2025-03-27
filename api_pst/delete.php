<?php
require '../config/connexion_db.php';


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'] ?? null;

    if (!empty($id)) {
        // Vérifier si le livre appartient à l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
        $stmt->execute([$id]);
        $livre = $stmt->fetch();

        if ($livre) {
            // Préparer la requête de suppression
            $stmt = $pdo->prepare("DELETE FROM livres WHERE id = ?");
            $stmt->execute([$id]);

            if ($stmt->rowCount() > 0) {
                echo "Livre supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression du livre.";
            }
        } else {
            echo "Erreur : Aucun livre trouvé avec cet ID ou vous n'avez pas la permission de le supprimer.";
        }
    } else {
        echo "L'ID ne peut pas être vide.";
    }
} else {
    echo "Méthode de requête non autorisée. Utilisez DELETE.";
}
?>

