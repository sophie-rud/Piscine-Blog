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

        $id = $_GET['id'];

        $articleRepository = new ArticleRepository();
        $article = $articleRepository->findOneById($id);

        require_once ('../template/page/showArticleView.php');
    }


}


// $articleController = new ArticleController();
// $articleController -> addArticle();

$articleController = new ArticleController();
$articleController -> showArticle();