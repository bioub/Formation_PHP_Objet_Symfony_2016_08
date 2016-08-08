<?php

require_once 'vendor/autoload.php';

use Prepavenir\Blog\Mapper\ArticleMapper;

$dsn = 'mysql:host=localhost;dbname=prepavenir_blog;charset=UTF8';
$username = 'root';
$passwd = '';

if (isset($_POST['titre'], $_POST['contenu'])) {
    $pdo = new PDO($dsn, $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mapper = new ArticleMapper($pdo);

    $article = new \Prepavenir\Blog\Entity\Article();
    $article->setTitre($_POST['titre'])
            ->setContenu($_POST['contenu']);

    if ($mapper->insert($article)) {
        $message = "L'article a bien été inséré";
    }
    else {
        $message = "Une erreur s'est produite pendant l'insertion";
    }
}

require_once 'views/ajouter.php';
