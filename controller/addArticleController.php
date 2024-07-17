<?php

require_once ('../config/config.php');
require_once ('../model/articleRepository.php');
class AddArticleController
{
    public function addArticle() {

        // Paramètres pour la création du nouvel article
        $titre = "Article du jour";
        $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $created_at = "2024-07-17";

        $articleRepository = new ArticleRepository();
        // on stocke dans la variable $isRequestOk le résultat issu de la méthode insert()
        $isRequestOk = $articleRepository -> insert($titre, $content, $created_at);

        require_once ('../template/page/addArticleView.php');
    }

}


$articleController = new AddArticleController();
$articleController -> addArticle();