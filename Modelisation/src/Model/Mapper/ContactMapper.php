<?php

namespace Prepavenir\Model\Mapper;

use Prepavenir\Model\Entity\Contact;

class ContactMapper
{
    /** @var \PDO */
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
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Contact::class);

        return $stmt->fetchAll();
    }

    public function save(Contact $contact)
    {
        if (!$contact->getId()) {
            // INSERT
            $sql = "INSERT INTO contact (prenom, nom, email, telephone)
                VALUES(:prenom, :nom, :email, :telephone)";
        }
        else {
            // TODO UPDATE
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue('prenom', $contact->getPrenom());
        $stmt->bindValue('nom', $contact->getNom());
        $stmt->bindValue('email', $contact->getEmail());
        $stmt->bindValue('telephone', $contact->getTelephone());

        return $stmt->execute();
    }
}