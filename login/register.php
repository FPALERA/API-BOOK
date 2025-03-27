<?php
session_start();
require '../config/connexion_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Vérifier si les champs sont remplis
    if (!empty($nom) && !empty($email) && !empty($mot_de_passe)) {
        // Hachage du mot de passe
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
        
        // Exécuter la requête
        if ($stmt->execute([$nom, $email, $hashed_password])) {
            echo "Inscription réussie ! Vous pouvez maintenant <a href='login.php'>vous connecter</a>.";
        } else {
            echo "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <form action="register.php" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required>
            
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required>

            <button type="submit">S'inscrire</button>
        </form>
        <div class="footer">
            <p>Vous avez déjà un compte ? <a href="login.php">Connectez-vous</a></p>
        </div>
    </div>
</body>
</html>

