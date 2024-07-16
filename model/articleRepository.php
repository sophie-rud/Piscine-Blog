<?php

require_once('../config/config.php');


class ArticleRepository {

    public function findAll() {

        // on établit la connexion avec la bdd
        $dbConnection = new DbConnection();
        $pdo = $dbConnection -> connect();

                
        // query() récupère des données de la bdd | ici on sélectionne toutes les colonnes de la table article de la bdd
        $stmt = $pdo->query("SELECT * FROM article");
        // nous retourne un tableau avec toutes les données précédemment sélectionnées
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $articles;
    }
}

// qui fait la requête SQL et qui retourne les articles


// Créez un dossier model au même niveau controller et template. A l'intérieur créez un fichier nommé ArticleRepository.php, contenant une classe ArticleRepository. A l'intérieur, créez une méthode "findArticle" qui fait la requête SQL et qui retourne les articles. Appelez cette méthode depuis votre controleur