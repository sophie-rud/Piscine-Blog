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

        // On fait l'appel twig à la place du REQUIRE
        // On indique où se trouvent tous les fichiers twig
        $loader = new \Twig\Loader\FilesystemLoader('../template');
        // Création de l'objet $twig
        $twig = new \Twig\Environment($loader);

        // On appelle le fichier twig
        echo $twig->render('page/addArticleView.html.twig', [
            'isRequestOk' => $isRequestOk
        ]);

        // require_once('../template/page/addArticleView.html.twig');
    }

    public function showArticle() {

        // On récupère l'id passé en url
        $id = $_GET['id'];

        // On instancie le ArticleRepository
        $articleRepository = new ArticleRepository();
        // On appelle la méthode qui permet de récupérer un article en fonction de son id
        $article = $articleRepository->findOneById($id);

        // TWIG
        $loader = new \Twig\Loader\FilesystemLoader('../template');
        $twig = new \Twig\Environment($loader);

        echo $twig->render('page/showArticleView.html.twig', [
            'article' => $article
        ]);

        // require_once('../template/page/showArticleView.html.twig');
    }


    public function deleteArticle() {
        $id = $_GET['id'];

        // On instancie le ArticleRepository
        $articleRepository = new ArticleRepository();
        // On appelle la méthode qui permet de supprimer un article en fonction de son id
        $deleteOK = $articleRepository -> deleteArticleById($id);


        if ($deleteOK) {
            // Redirection sur la page d'accueil avec tous les articles après suppression de l'article
            header('location: http://localhost/piscine-blog/public/');
        } else {
            // require_once('../template/page/deleteArticleFailView.html.twig');

            // On fait l'appel twig à la place du REQUIRE
            // On indique où se trouvent tous les fichiers twig
            $loader = new \Twig\Loader\FilesystemLoader('../template');
            // Création de l'objet $twig
            $twig = new \Twig\Environment($loader);

            // On appelle le fichier twig
            echo $twig->render('page/deleteArticleFailView.html.twig', [
                'deleteOK' => $deleteOK
            ]);
        }

    }

}

