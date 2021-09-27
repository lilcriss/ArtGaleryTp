<?php

namespace App\Entity;

use App\Repository\InvitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvitesRepository::class)
 */
class Invites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pass;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rgpd;

    /**
     * @ORM\ManyToOne(targetEntity=Evenements::class, inversedBy="invite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenements;

    /**
     * @ORM\ManyToMany(targetEntity=encheres::class, inversedBy="no")
     */
    private $prix;

    public function __construct()
    {
        $this->prix = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getRgpd(): ?string
    {
        return $this->rgpd;
    }

    public function setRgpd(string $rgpd): self
    {
        $this->rgpd = $rgpd;

        return $this;
    }

    public function getEvenements(): ?Evenements
    {
        return $this->evenements;
    }

    public function setEvenements(?Evenements $evenements): self
    {
        $this->evenements = $evenements;

        return $this;
    }

    /**
     * @return Collection|encheres[]
     */
    public function getPrix(): Collection
    {
        return $this->prix;
    }

    public function addPrix(encheres $prix): self
    {
        if (!$this->prix->contains($prix)) {
            $this->prix[] = $prix;
        }

        return $this;
    }

    public function removePrix(encheres $prix): self
    {
        $this->prix->removeElement($prix);

        return $this;
    }
}
