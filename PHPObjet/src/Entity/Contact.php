<?php


namespace BEA\Entity;


class Contact
{
    protected $id;
    protected $prenom;
    protected $nom;

    /** @var Societe */
    protected $societe;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Contact
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
     * @return Contact
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
     * @return Contact
     */
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