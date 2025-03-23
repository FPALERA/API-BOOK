<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $stmt = $pdo->query("SELECT * FROM livres");
    $livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($livres);
}
?>
