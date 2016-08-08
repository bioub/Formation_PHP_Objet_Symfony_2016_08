<?php

require_once 'vendor/autoload.php';

use Prepavenir\Blog\Mapper\ArticleMapper;

$dsn = 'mysql:host=localhost;dbname=prepavenir_blog;charset=UTF8';
$username = 'root';
$passwd = '';

$pdo = new PDO($dsn, $username, $passwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$mapper = new ArticleMapper($pdo);

$articles = $mapper->findAllWithAuteur();

require_once 'views/index.php';


