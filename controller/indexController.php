<?php

require_once('../config/config.php');



// * sélectionne toutes les colonnes
$stmt = $pdo->query("SELECT * FROM article");

// nous retourne un tableau avec toutes les données articles
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


require_once('../template/page/indexView.php');
