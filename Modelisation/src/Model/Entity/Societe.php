<?php

namespace Prepavenir\Model\Entity;


class Societe
{
    protected $nom;
    protected $adresse;

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


}