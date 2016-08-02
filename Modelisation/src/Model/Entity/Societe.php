<?php

namespace Prepavenir\Model\Entity;


class Societe
{
    protected $nom;
    protected $adresse;

    /**
     * @var Contact[]
     */
    protected $contacts = [];

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Societe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     * @return Societe
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return Contact[]
     */
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