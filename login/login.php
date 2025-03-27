<?php
session_start();
require '../config/connexion_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Vérifier si les champs sont remplis
    if (!empty($email) && !empty($mot_de_passe)) {
        // Préparer la requête pour récupérer l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $utilisateur = $stmt->fetch();

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            // Authentification réussie, démarrer la session
            $_SESSION['user_id'] = $utilisateur['id'];
            $_SESSION['user_nom'] = $utilisateur['nom'];
            header("Location: ../index.php");
            exit();
        } else {
            $error_message = "Email ou mot de passe incorrect.";
        }
    } else {
        $error_message = "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required>

            <button type="submit">Se connecter</button>
        </form>
        <div class="footer">
            <p>Vous n'avez pas de compte ? <a href="register.php">Inscrivez-vous</a></p>
        </div>
    </div>
</body>
</html>

