<?php
$host = 'localhost';
$db = 'gestion_livres';
$user = 'root'; // Utilisateur de la BD
$pass = ''; // Mot de passe de la BD

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
