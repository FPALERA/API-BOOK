<?php
// Inclure la configuration de la base de données
require 'config.php';
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
    <div class="container">
        <h1>Gestion de Livres</h1>
        <div class="options">
            <button onclick="showForm('add')">Ajouter un Livre</button>
            <button onclick="showForm('delete')">Supprimer un Livre</button>
            <button onclick="showForm('display')">Afficher les Livres</button>
        </div>

        <div id="formContainer"></div>
    </div>

    <script>
        function showForm(action) {
            let formHtml = '';

            if (action === 'add') {
                formHtml = `
                    <h2>Ajouter un Livre</h2>
                    <form action="create.php" method="POST">
                        <input type="text" name="titre" placeholder="Titre" required>
                        <input type="text" name="auteur" placeholder="Auteur" required>
                        <input type="number" name="annee_publication" placeholder="Année de Publication" required>
                        <input type="text" name="isbn" placeholder="ISBN" required>
                        <input type="number" name="nombre_pages" placeholder="Nombre de Pages" required>
                        <input type="text" name="genre" placeholder="Genre">
                        <input type="text" name="editeur" placeholder="Éditeur">
                        <input type="number" name="quantite_en_stock" placeholder="Quantité en Stock" required>
                        <button type="submit">Ajouter</button>
                    </form>
                `;
            } else if (action === 'delete') {
                formHtml = `
                    <h2>Supprimer un Livre</h2>
                    <form action="delete.php" method="POST">
                        <input type="number" name="id" placeholder="ID du Livre à Supprimer" required>
                        <button type="submit">Supprimer</button>
                    </form>
                `;
            } else if (action === 'display') {
                formHtml = `
                    <h2>Livres Disponibles</h2>
                    <div id="livres"></div>
                `;
                fetch('read.php')
                    .then(response => response.json())
                    .then(data => {
                        const livresDiv = document.getElementById('livres');
                        livresDiv.innerHTML = '<ul>' + data.map(livre => `<li>${livre.titre} par ${livre.auteur}</li>`).join('') + '</ul>';
                    });
            }

            document.getElementById('formContainer').innerHTML = formHtml;
        }
    </script>
</body>
</html>

