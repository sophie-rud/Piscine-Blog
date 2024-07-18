<?php

require_once('../controller/articleController.php');
require_once('../controller/indexController.php');

    // Récupération de l'url, on la stocke dans la variable $requestUri
$requestUri = $_SERVER['REQUEST_URI'];
    // parse_url analyse l'url reçue
$uri = parse_url($requestUri, PHP_URL_PATH);
    // On complète l'uri (on ajoute le début de l'uri) pour qu'elle soit valide
$endUri = str_replace('/piscine-blog/public/', '', $uri);
    // retourne l'uri après suppression des espaces
$endUri = trim($endUri, '/');


// Selon l'$endUri entrée, création d'une nouvelle instance de classe et appel de la méthode correspondante à la requête
if($endUri === "") {

    $indexController = new IndexController();
    $indexController->index();


} else if ($endUri === "add-article") {

    $articleController = new ArticleController();
    $articleController->addArticle();


} else if ($endUri === "show-article") {

    $articleController = new ArticleController();
    $articleController->showArticle();


} else if($endUri === "delete-article") {

    $articleController = new ArticleController();
    $articleController->deleteArticle();

    // sinon afficher un message d'erreur
} else {
    echo '<p>Nop</p>';
}