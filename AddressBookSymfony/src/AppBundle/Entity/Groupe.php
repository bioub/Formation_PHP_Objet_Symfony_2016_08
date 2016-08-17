<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="groupe")
 */
class Groupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    protected $id;

    /** @ORM\Column(length=40) */
    protected $nom;

    /** @ORM\Column(type="text") */
    protected $description;

    /** @ORM\ManyToMany(targetEntity="AppBundle\Entity\Contact", mappedBy="groupes") */
    protected $contacts;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Groupe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Groupe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return Groupe
     */
    public function addContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \AppBundle\Entity\Contact $contact
     */
    public function removeContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
