<?php

namespace Prepavenir\Model\ActiveRecord;


class Contact
{
    protected $id;
    protected $prenom;
    protected $nom;
    protected $email;
    protected $telephone;

    /**
     * @var \PDO
     */
    static protected $pdo;

    static public function setPdo(\PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    static public function findAll() {
        // à appeler en écrivant
        // $contacts = Contact::findAll();

        $sql = "SELECT id, prenom, nom, email, telephone
                FROM contact
                LIMIT 100";

        $stmt = self::$pdo->query($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    public function save()
    {
        // A appeler pour l'insertion
        // $contact = new Contact();
        // $contact->setPrenom('Romain');
        // $contact->save();

        // A appeler pour un update
        // $contact = Contact::find(12);
        // $contact->setTelephone('06');
        // $contact->save();

        if (!$this->id) {
            // INSERT
            $sql = "INSERT INTO contact (prenom, nom, email, telephone)
                VALUES(:prenom, :nom, :email, :telephone)";
        }
        else {
            // TODO UPDATE
        }

        $stmt = self::$pdo->prepare($sql);

        $stmt->bindValue('prenom', $this->prenom);
        $stmt->bindValue('nom', $this->nom);
        $stmt->bindValue('email', $this->email);
        $stmt->bindValue('telephone', $this->telephone);

        return $stmt->execute();
    }

    public function delete()
    {
        // Pour une suppression
        // $contact = Contact::find(12);
        // $contact->delete();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ContactActiveRecord
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return ContactActiveRecord
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
     * @return ContactActiveRecord
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return ContactActiveRecord
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     * @return ContactActiveRecord
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }


}