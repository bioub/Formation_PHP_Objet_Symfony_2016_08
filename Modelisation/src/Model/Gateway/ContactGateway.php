<?php

namespace Prepavenir\Model\Gateway;


class ContactGateway
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function findAll()
    {
        $sql = "SELECT id, prenom, nom, email, telephone
                FROM contact
                LIMIT 100";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert(array $data)
    {
        $sql = "INSERT INTO contact (prenom, nom, email, telephone)
                VALUES(:prenom, :nom, :email, :telephone)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($data);
    }
}