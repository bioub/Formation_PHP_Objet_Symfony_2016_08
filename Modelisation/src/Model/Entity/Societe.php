<?php

namespace Prepavenir\Model\Entity;


class Societe
{
    protected $nom;

    /**
     * @var Contact[]
     */
    protected $contacts = [];

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact)
    {
        $this->contacts[] = $contact;
        return $this;
    }

}