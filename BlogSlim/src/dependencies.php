<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

$container['pdo'] = function($c) {
    $settings = $c->get('settings')['pdo'];
    $dsn = $settings['dsn'];
    $username = $settings['username'];
    $passwd = $settings['passwd'];
    $pdo = new PDO($dsn, $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};

$container['articleMapper'] = function($c) {
    $pdo = $c->pdo;
    $articleMapper = new \Prepavenir\Blog\Mapper\ArticleMapper($pdo);
    return $articleMapper;
};

$container['auteurMapper'] = function($c) {
    $pdo = $c->pdo;
    $auteurMapper = new \Prepavenir\Blog\Mapper\AuteurMapper($pdo);
    return $auteurMapper;
};