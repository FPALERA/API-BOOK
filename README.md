# Documentation de l'API de Gestion de Livres

## Introduction
Cette API permet de gérer une base de données de livres. Elle offre des fonctionnalités CRUD (Create, Read, Update, Delete) pour interagir avec les informations relatives aux livres, telles que le titre, l'auteur, la date de publication, l'ISBN, le nombre de pages, le genre, l'éditeur et la quantité en stock.

## Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur
- Accès à phpMyAdmin pour la gestion de la base de données ( enregistrer vos identifiants DB dans config/connexion_db.php )

## Endpoints

### 1. Récupérer la liste des livres
- **Méthode** : GET
- **Endpoint** : `/read.php`
- **Description** : Récupère la liste de tous les livres enregistrés dans la base de données.
- **Réponse** : Un tableau contenant les informations de chaque livre, affiché sous forme de table HTML.

### 2. Ajouter un nouveau livre
- **Méthode** : POST
- **Endpoint** : `/create.php`
- **Payload** :
titre=Le Petit Prince&auteur=Antoine de Saint-Exupéry&annee_publication=1943&isbn=978-2-07-036274-5&nombre_pages=96&genre=Littérature&editeur=Gallimard&quantite_en_stock=10

- **Description** : Ajoute un nouveau livre dans la base de données.
- **Réponse** : Un message indiquant que le livre a été ajouté avec succès, avec son nouvel ID.

### 3. Mettre à jour un livre
- **Méthode** : POST
- **Endpoint** : `/update.php`
- **Payload** :
id=1&titre=Le Petit Prince (Édition Illustrée)&quantite_en_stock=15

- **Description** : Met à jour les informations d'un livre existant dans la base de données.
- **Réponse** : Un message indiquant que le livre a été mis à jour avec succès.

### 4. Supprimer un livre
- **Méthode** : DELETE
- **Endpoint** : `/delete.php`
- **Payload** :
id=1

- **Description** : Supprime un livre de la base de données.
- **Réponse** : Un message indiquant que le livre a été supprimé avec succès.

## Sécurité
Cette API utilise un système d'authentification basé sur les sessions PHP. Les utilisateurs doivent se connecter pour pouvoir accéder aux fonctionnalités de l'API.

## Gestion des erreurs
L'API gère les erreurs de manière appropriée et renvoie des messages d'erreur clairs en cas de problème (requête invalide, ressource non trouvée, etc.).

## Conclusion
Cette API de gestion de livres offre des fonctionnalités de base pour interagir avec une base de données de livres. Elle peut être étendue avec des fonctionnalités supplémentaires, telles que la recherche avancée, la pagination, l'authentification OAuth2, etc.

N'hésitez pas à me contacter si vous avez des questions ou des suggestions d'amélioration.

Voici un résumé du contenu des fichiers PHP :

read.php : Récupère la liste de tous les livres enregistrés dans la base de données et les affiche sous forme de table HTML.
create.php : Permet d'ajouter un nouveau livre dans la base de données.
update.php : Permet de mettre à jour les informations d'un livre existant dans la base de données.
delete.php : Permet de supprimer un livre de la base de données.


Ces fichiers utilisent la connexion à la base de données définie dans le fichier connexion_db.php et gèrent les sessions utilisateur pour s'assurer que seuls les utilisateurs authentifiés peuvent accéder aux fonctionnalités de l'API.

#### Obtenir un serveur ici
<a href="https://www.digitalocean.com/?refcode=1ddbfbb00962&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge"><img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%201.svg" alt="DigitalOcean Referral Badge" /></a>

#### CONTACTS
<a href="https://wa.me/22658179319"><img src="https://static.whatsapp.net/rsrc.php/yZ/r/JvsnINJ2CZv.svg" alt="Whatsapp"/></a><br>
<a href="https://t.me/FPALERA"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTabR5clmX2Zr-bKFnq8j1k1_JkJbr8JAdW3A&s" alt="Telegram" /></a>

#### ```FPALERA PROFILE VIEWS 🧚```
![Visitor Count](https://profile-counter.glitch.me/FPALERA/count.svg)

