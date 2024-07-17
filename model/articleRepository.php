<?php

require_once('../config/config.php');


class ArticleRepository {
    // Création de la méthode "findArticles" qui fait la requête SQL et qui retourne les articles
    public function findArticles() {

        // on instancie la classe DbConnection
        $dbConnection = new DbConnection();
        // on appelle la méthode qui établit avec la bdd
        $pdo = $dbConnection -> connect();

                
        // query() fait une requête vers la bdd -> là on sélectionne toutes les colonnes de la table article de la bdd
        $stmt = $pdo->query("SELECT * FROM article");
        // nous retourne un tableau avec toutes les données précédemment sélectionnées
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $articles;
    }
}



