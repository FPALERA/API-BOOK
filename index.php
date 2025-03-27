<?php
require 'config/connexion_db.php';
session_start();

// Afficher la date et l'heure
$dateHeure = date('Y-m-d H:i:s');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API de Gestion de Livres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="date-heure">
    <?php echo htmlspecialchars($dateHeure); ?>
</div>
    <div class="container">
    <h1><img src="thumb.png" alt="Thumbnail" class="thumb-image">Bienvenue, <?php echo htmlspecialchars($_SESSION['user_nom']); ?>! 👋👋👋</h1>
        <button onclick="showForm('logout')"><a href="login/logout.php">Se déconnecter</a></button>
        <h2>Gestion de Livres</h2>
        <div class="options">
            <button onclick="showForm('add')">Ajouter un Livre</button>
            <button onclick="showForm('delete')">Supprimer un Livre</button>
            <button onclick="showForm('update')">Modifier un Livre</button>
            <button onclick="showForm('display')">Afficher les Livres</button>
        </div>

        <div id="formContainer"></div>
    </div>

    <script>
        function showForm(action) {
            let formHtml = '';

            if (action === 'add') {
                formHtml = `
                    <h2>Ajouter un Livre 📖</h2>
                    <form action="api/create.php" method="POST">
                        <input type="text" name="titre" placeholder="Titre" required>
                        <input type="text" name="auteur" placeholder="Auteur" required>
                        <input type="number" name="annee_publication" placeholder="Année de Publication" required>
                        <input type="text" name="isbn" placeholder="ISBN" required>
                        <input type="number" name="nombre_pages" placeholder="Nombre de Pages" required>
                        <input type="text" name="genre" placeholder="Genre">
                        <input type="text" name="editeur" placeholder="Éditeur">
                        <input type="number" name="quantite_en_stock" placeholder="Quantité en Stock" required>
                        <button type="submit">Ajouter 📖</button>
                    </form>
                `;
            } else if (action === 'delete') {
                formHtml = `
                    <h2>Supprimer un Livre ❌</h2>
                    <form id="deleteForm" onsubmit="return false;">
                        <input type="number" name="id" placeholder="ID du Livre à Supprimer" required>
                        <button type="button" onclick="deleteLivre()">Supprimer ❌</button>
                    </form>
                `;
            } else if (action === 'update') {
                formHtml = `
                    <h2>Modifier un Livre 📝</h2>
                    <h4>Laisser vide les champs à ne pas modifier !</h4>
                    <form id="updateForm" action="api/update.php" method="POST">
                        <input type="number" name="id" placeholder="ID du Livre à Modifier" required>
                        <input type="text" name="titre" placeholder="Titre">
                        <input type="text" name="auteur" placeholder="Auteur">
                        <input type="number" name="annee_publication" placeholder="Année de Publication">
                        <input type="text" name="isbn" placeholder="ISBN">
                        <input type="number" name="nombre_pages" placeholder="Nombre de Pages">
                        <input type="text" name="genre" placeholder="Genre">
                        <input type="text" name="editeur" placeholder="Éditeur">
                        <input type="number" name="quantite_en_stock" placeholder="Quantité en Stock">
                        <button type="submit">Modifier 📝</button>
                    </form>
                `;
            } else if (action === 'display') {
                formHtml = `
                    <h2>Livres Disponibles 📚</h2>
                    <div id="livres"></div>
                `;
                fetch('api/read.php')
                    .then(response => response.text()) // Changer ici pour récupérer le texte brut
                    .then(data => {
                        const livresDiv = document.getElementById('livres');
                        livresDiv.innerHTML = data; // Affichage direct des livres
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });
            }

            document.getElementById('formContainer').innerHTML = formHtml;
        }

        function deleteLivre() {
            const form = document.getElementById('deleteForm');
            const id = form.id.value;

            fetch('http://localhost/API-BOOK/api/delete.php', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${id}`
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Afficher le message de succès ou d'erreur
                showForm('delete'); // Réafficher le formulaire de suppression
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        }
    </script>
</body>
</html>

