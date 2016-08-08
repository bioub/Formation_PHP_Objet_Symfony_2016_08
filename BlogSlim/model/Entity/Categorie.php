<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 05/08/2016
 * Time: 09:41
 */

namespace Prepavenir\Blog\Entity;


class Categorie
{
    protected $id;
    protected $nom;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Categorie
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }


}