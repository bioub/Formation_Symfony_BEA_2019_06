<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=40)
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     * @Assert\Length(max="40")
     */
    protected $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=40)
     * @Assert\NotBlank()
     * @Assert\Length(max="40", maxMessage="Le nom ne doit pas dépasser {{ limit }} caractères")
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true, unique=true)
     * @Assert\Email(strict=true, message="L'email est incorrect")
     * @Assert\Length(max="80")
     */
    protected $email;


    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    protected $dateNaissance;

    /**
     * @var string
     * @ORM\Column(length=10, nullable=true)
     * @Assert\Choice({"M.", "Mme."})
     */
    protected $gentile;

    /**
     * @var string
     * @ORM\Column(type="simple_array", nullable=true)
     */
    protected $hobbies;

    // @ORM\ManyToOne(targetEntity="AppBundle\Entity\Societe", fetch="EAGER")
    /**
     * @var Societe
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Societe")
     */
    protected $societe;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Contact
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
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }



    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Contact
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set gentile
     *
     * @param string $gentile
     *
     * @return Contact
     */
    public function setGentile($gentile)
    {
        $this->gentile = $gentile;

        return $this;
    }

    /**
     * Get gentile
     *
     * @return string
     */
    public function getGentile()
    {
        return $this->gentile;
    }

    /**
     * Set hobbies
     *
     * @param array $hobbies
     *
     * @return Contact
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * Get hobbies
     *
     * @return array
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Set societe
     *
     * @param \AppBundle\Entity\Societe $societe
     *
     * @return Contact
     */
    public function setSociete(\AppBundle\Entity\Societe $societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \AppBundle\Entity\Societe
     */
    public function getSociete()
    {
        return $this->societe;
    }
}
