<?php

namespace Prepavenir\Blog\Entity;


class Article
{
    protected $id;
    protected $titre;
    protected $contenu;

    /** @var Auteur */
    protected $auteur;

    /** @var Categorie[] */
    protected $categories = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Article
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return Auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param Auteur $auteur
     * @return Article
     */
    public function setAuteur(Auteur $auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * @return Categorie[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    public function addCategorie(Categorie $categorie)
    {
        $this->categories[] = $categorie;
        return $this;
    }

}