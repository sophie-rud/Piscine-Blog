<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_set_cookie_params(3600);


// Création d'une nouvelle classe : DbConnection
class DbConnection {

    private $dsn;

    private $username;

    private $password;

    // La méthode __construct est appelée à chaque création d'une nouvelle instance de la classe
    function __construct() {
            $this->dsn = 'mysql:host=localhost:3306;dbname=piscine_blog_php';
            $this->username = 'root';
            $this->password = 'root';
    }

    // La méthode connect() permet de tester la connexion à la bdd
    public function connect() {
        // try, catch : bloc de test pour gérer les erreurs
       try {
            // création d'une nouvelle instance de la classe PDO / connexion à la base de données pour vérifier les identifiants
            $pdo = new PDO($this->dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        // catch permet d'afficher un message d'erreur si les conditions de connexion ne sont pas vérifiées
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

}





// On établit la connexion entre le php et la base de données, on récupère le lien vers mysql et les identifiants de connexion
// PDO est une classe, qui essaye automatiquement de se connecter à la base de données quand on lui rentre des paramètres

// try permet de tester les identifiants de connexion, (try, catch ressemble à un si, sinon). 
    // On créé une nouvelle instance de la classe PDO / connexion à la base de données pour vérifier les identifiants,
    // setAttribute permet de gérer comment l'erreur est affichée
    // le catch permet d'afficher un message d'erreur si les conditions ne sont pas vérifiées
