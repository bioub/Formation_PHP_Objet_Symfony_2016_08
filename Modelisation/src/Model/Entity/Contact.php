<?php

namespace Prepavenir\Model\Entity;

class Contact
{
    protected $prenom;
    protected $nom;

    /**
     * @var Societe
     */
    protected $societe; // reference vers un objet de type Societe

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return Societe
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * @param Societe $societe
     * @return Contact
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
        return $this;
    }



}