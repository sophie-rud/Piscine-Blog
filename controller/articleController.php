<?php

require_once ('../config/config.php');
require_once ('../model/articleRepository.php');

class ArticleController
{
    public function addArticle() {

        $isRequestOk = false;
        // On récupère les paramètres entrés dans le formulaire pour créer le nouvel article
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titre = $_POST['titre'];
            $content = $_POST['content'];
            $dateNow = new DateTime("NOW");
            $created_at = $dateNow -> format('Y-m-d');

            $articleRepository = new ArticleRepository();
            // on stocke dans la variable $isRequestOk le résultat issu de la méthode insert()
            $isRequestOk = $articleRepository -> insert($titre, $content, $created_at);
        }

        require_once('../template/page/addArticleView.php');
    }

    public function showArticle() {

        // On récupère l'id passé en url
        $id = $_GET['id'];

        // On instancie le ArticleRepository
        $articleRepository = new ArticleRepository();
        // On appelle la méthode qui permet de récupérer un article en fonction de son id
        $article = $articleRepository->findOneById($id);

        require_once ('../template/page/showArticleView.php');
    }


    public function deleteArticle() {
        $id = $_GET['id'];

        // On instancie le ArticleRepository
        $articleRepository = new ArticleRepository();
        // On appelle la méthode qui permet de supprimer un article en fonction de son id
        $delete = $articleRepository -> deleteArticleById($id);


        // Redirection sur la page d'accueil avec tous les articles après suppression de l'article
        header('location: http://localhost/piscine-blog/public/');
        require_once ('../template/page/deleteArticleView.php');

    }

}

