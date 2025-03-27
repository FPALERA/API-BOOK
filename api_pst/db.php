<?php
$host = 'localhost';
$db = 'test';
$user = 'root'; // Utilisateur de la BD
$pass = 'PALERA@2003'; // Mot de passe de la BD

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
