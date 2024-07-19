<?php

require_once('../config/config.php');
require_once('../model/articleRepository.php');


class IndexController {

    public function index() {

        // on instancie la classe ArticleRepository
        $articleRepository = new ArticleRepository();
        // on appelle la méthode findArticles() qui fait la requête SQL et retourne les articles
        $articles = $articleRepository -> findArticles();

        // On indique où se trouvent tous les fichiers twig
        $loader = new \Twig\Loader\FilesystemLoader('../template');
        // Création de l'objet $twig
        $twig = new \Twig\Environment($loader);

        // On appelle le fichier twig
        echo $twig->render('page/index.html.twig', [
            'articles' => $articles
        ]);


        // L'appel à la view est remplacé par l'appel au fichier twig
        // on appelle la view qui affiche le HTML
        // require_once('../template/page/indexView.php');
    }
}




