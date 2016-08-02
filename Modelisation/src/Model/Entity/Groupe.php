<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 02/08/2016
 * Time: 10:01
 */

namespace Prepavenir\Model\Entity;


class Groupe
{
    protected $nom;
    protected $description;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Groupe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Groupe
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


}