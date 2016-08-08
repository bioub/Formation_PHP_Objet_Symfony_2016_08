<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 03/08/2016
 * Time: 16:26
 */

namespace Prepavenir\Exercice\Entity;


class Personne
{
    protected $prenom;
    protected $nom;

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Personne
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Personne
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }


}