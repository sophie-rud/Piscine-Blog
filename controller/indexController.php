<?php
class IndexController {

    public function index() {
        require_once('../config/config.php');

        // on établit la connexion avec la bdd
        $dbConnection = new DbConnection();
        $pdo = $dbConnection -> connect();
        
        // query() récupère des données de la bdd | ici on sélectionne toutes les colonnes de la table article de la bdd
        $stmt = $pdo->query("SELECT * FROM article");
        // nous retourne un tableau avec toutes les données précédemment sélectionnées
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        require_once('../template/page/indexView.php');
    }

}

// création d'une nouvelle instance de la classe IndexController
$indexController = new IndexController;
$indexController->index();


