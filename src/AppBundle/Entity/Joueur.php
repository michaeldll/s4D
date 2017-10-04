<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueurRepository")
 */
class Joueur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=50, unique=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Partie", mappedBy="joueur1")
     */
    private $partiesj1;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Partie", mappedBy="joueur2")
     */
    private $partiesj2;


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
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Joueur
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     *
     * @return Joueur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Joueur
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
     * Constructor
     */
    public function __construct()
    {
        $this->partiesj1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->partiesj2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add partiesj1
     *
     * @param \AppBundle\Entity\Partie $partiesj1
     *
     * @return Joueur
     */
    public function addPartiesj1(\AppBundle\Entity\Partie $partiesj1)
    {
        $this->partiesj1[] = $partiesj1;

        return $this;
    }

    /**
     * Remove partiesj1
     *
     * @param \AppBundle\Entity\Partie $partiesj1
     */
    public function removePartiesj1(\AppBundle\Entity\Partie $partiesj1)
    {
        $this->partiesj1->removeElement($partiesj1);
    }

    /**
     * Get partiesj1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesj1()
    {
        return $this->partiesj1;
    }

    /**
     * Add partiesj2
     *
     * @param \AppBundle\Entity\Partie $partiesj2
     *
     * @return Joueur
     */
    public function addPartiesj2(\AppBundle\Entity\Partie $partiesj2)
    {
        $this->partiesj2[] = $partiesj2;

        return $this;
    }

    /**
     * Remove partiesj2
     *
     * @param \AppBundle\Entity\Partie $partiesj2
     */
    public function removePartiesj2(\AppBundle\Entity\Partie $partiesj2)
    {
        $this->partiesj2->removeElement($partiesj2);
    }

    /**
     * Get partiesj2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesj2()
    {
        return $this->partiesj2;
    }
}
