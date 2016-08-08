<?php

namespace Prepavenir\Blog\Mapper;

use PDO;
use Prepavenir\Blog\Entity\Article;
use Prepavenir\Blog\Entity\Auteur;

class ArticleMapper
{
    /** @var PDO */
    protected $pdo;

    /**
     * ArticleMapper constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll()
    {
        $sql = 'SELECT id, titre, contenu
                FROM article
                LIMIT 100';

        $stmt = $this->pdo->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Article::class);

        return $stmt->fetchAll();
    }

    public function findAllWithAuteur()
    {
        $sql = 'SELECT article.id, titre, contenu, auteur_id, pseudo
                FROM article
                LEFT JOIN auteur ON auteur_id = auteur.id';

        $stmt = $this->pdo->query($sql);

        $resultAssoc = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $articles = [];

        foreach ($resultAssoc as $result) {
            $article = new Article();
            $article->setId($result['id'])
                    ->setTitre($result['titre'])
                    ->setContenu($result['contenu']);

            if ($result['auteur_id']) {
                $auteur = new Auteur();
                $auteur->setId($result['auteur_id'])
                       ->setPseudo($result['pseudo']);

                $article->setAuteur($auteur);
            }

            $articles[] = $article;
        }

        return $articles;
    }

    public function insert(Article $article)
    {
        $sql = 'INSERT INTO article (titre, contenu)  
                VALUES (:titre, :contenu)';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue('titre', $article->getTitre());
        $stmt->bindValue('contenu', $article->getContenu());

        return $stmt->execute();
    }
}