<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 05/08/2016
 * Time: 09:41
 */

namespace Prepavenir\Blog\Entity;


class Auteur
{
    protected $id;
    protected $pseudo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Auteur
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     * @return Auteur
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }


}