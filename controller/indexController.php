<?php

require_once('../config/config.php');
require_once('../model/articleRepository.php');


class IndexController {

    public function index() {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository -> findAll();
       
        require_once('../template/page/indexView.php');
    }
}

// création d'une nouvelle instance de la classe ArticleRepository
$indexController = new IndexController();
$indexController->index();


