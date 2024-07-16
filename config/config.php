<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_set_cookie_params(3600);


// On établit la connexion entre le php et la base de données, on récupère le lien vers mysql et les identifiants de connexion
// PDO est une classe, qui essaye automatiquement de se connecter à la base de données quand on lui rentre des paramètres
$dsn = 'mysql:host=localhost:3306;dbname=piscine_blog_php';
$username = 'root';
$password = 'root';


// try permet de tester les identifiants de connexion, (try, catch ressemble à un si, sinon). 
try {
    // On créé une nouvelle instance de classe PDO de connexion à la base de données
    $pdo = new PDO($dsn, $username, $password);
    // pour vérifier les identifiants, setAttribute permet de gérer comment l'erreur est affichée
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // le catch permet d'afficher un message d'erreur si les conditions ne sont pas vérifiées
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}