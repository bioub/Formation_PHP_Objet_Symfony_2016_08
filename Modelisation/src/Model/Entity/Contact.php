<?php

namespace Prepavenir\Model\Entity;

class Contact
{
    protected $prenom;

    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }
}