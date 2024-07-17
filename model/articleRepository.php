<?php

require_once('../config/config.php');


class ArticleRepository {

    private $pdo;

    function __construct() {
        // On établit la connexion avec la base de données. On instancie la classe DbConnection
        $dbConnection = new DbConnection();
        // on appelle la méthode qui établit le lien avec la bdd
        $this->pdo = $dbConnection -> connect();
    }


    // Création de la méthode "findArticles" qui fait la requête SQL et qui retourne les articles
    public function findArticles() {

        // query() fait une requête vers la bdd -> là on sélectionne toutes les colonnes de la table article de la bdd
        $stmt = $this->pdo->query("SELECT * FROM article");
        // nous retourne un tableau avec toutes les données précédemment sélectionnées
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $articles;
    }

    public function insert($titre, $content, $created_at) {

        // On prépare la requête d'insertion des données avec des données temporaires
        $sql = "INSERT INTO article (titre, content, created_at) VALUES (:titre, :content, :created_at)";
        $stmt = $this->pdo->prepare($sql);

        // On remplace les paramètres précédemment entrés (données temporaires -> :title...) par les "vrais" paramètres.
        // On réalise cette action en plusieurs étapes pour sécuriser les données entrées par l'utilisateur et éviter l'injection SQL.
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $created_at);

        // On exécute la requête et on enregistre le résultat dans une variable (booléen)
        $isRequestOk = $stmt->execute();

        return $isRequestOk;

    }

}



