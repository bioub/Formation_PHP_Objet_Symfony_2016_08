<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', [
        'articles' => $this->articleMapper->findAllWithAuteur()
    ]);
});


$app->get('/ajouter', function (\Slim\Http\Request $request, $response, $args) {
    // Render index view
    return $this->renderer->render($response, 'ajouter.phtml', [
        'auteurs' => $this->auteurMapper->findAll()
    ]);
});

$app->post('/ajouter', function (\Slim\Http\Request $request, $response, $args) {
    $mapper = $this->articleMapper;

    $article = new \Prepavenir\Blog\Entity\Article();
    $article->setTitre($_POST['titre'])
        ->setContenu($_POST['contenu']);

    $auteur = new \Prepavenir\Blog\Entity\Auteur();
    $auteur->setId($_POST['auteur_id']);
    $article->setAuteur($auteur);

    $variables = [];
    $variables['auteurs'] = $this->auteurMapper->findAll();

    if ($mapper->insert($article)) {
        $variables['message'] = "L'article a bien été inséré";
    }
    else {
        $variables['message'] = "Une erreur s'est produite pendant l'insertion";

    }

    return $this->renderer->render($response, 'ajouter.phtml', $variables);
});
