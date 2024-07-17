<?php

require_once ('../config/config.php');
class AddArticleController
{
    public function addArticle() {

        // On établit la connexion avec la base de données
        $dbConnection = new DbConnection();
        $pdo = $dbConnection -> connect();

        // Paramètres pour la création du nouvel article
        $titre = "Article du jour";
        $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $created_at = "2024-07-17";

        // On prépare la requête d'insertion des données
        $sql = "INSERT INTO article (titre, content, created_at) VALUES (:titre, :content, :created_at)";
        $stmt = $pdo->prepare($sql);

        // On remplace les paramètres précédemment entrés (:title...) par les "vrais" paramètres.
        // On réalise cette action en plusieurs pour sécuriser les données entrées par l'utilisateur et éviter l'injection PHP.
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $created_at);


        // On exécute la requête et on affiche un message de réussite ou d'erreur
        if ($stmt->execute()) {
            echo "Nouveau article ajouté avec succès";
        } else {
            echo "Erreur lors de l'ajout de l'article";
        }

    }

}


$articleController = new AddArticleController();
$articleController -> addArticle();