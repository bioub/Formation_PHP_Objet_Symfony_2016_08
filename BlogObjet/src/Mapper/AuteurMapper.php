<?php

namespace Prepavenir\Blog\Mapper;

use PDO;
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
        $sql = 'SELECT id, pseudo
                FROM auteur
                LIMIT 100';

        $stmt = $this->pdo->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Auteur::class);

        return $stmt->fetchAll();
    }
}