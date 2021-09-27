<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementsRepository::class)
 */
class Evenements
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
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=oeuvres::class, mappedBy="evenement")
     */
    private $oeuvre;

    /**
     * @ORM\OneToMany(targetEntity=invites::class, mappedBy="evenements")
     */
    private $invite;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="administrator")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    public function __construct()
    {
        $this->oeuvre = new ArrayCollection();
        $this->invite = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|oeuvres[]
     */
    public function getOeuvre(): Collection
    {
        return $this->oeuvre;
    }

    public function addOeuvre(oeuvres $oeuvre): self
    {
        if (!$this->oeuvre->contains($oeuvre)) {
            $this->oeuvre[] = $oeuvre;
            $oeuvre->setEvenement($this);
        }

        return $this;
    }

    public function removeOeuvre(oeuvres $oeuvre): self
    {
        if ($this->oeuvre->removeElement($oeuvre)) {
            // set the owning side to null (unless already changed)
            if ($oeuvre->getEvenement() === $this) {
                $oeuvre->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|invites[]
     */
    public function getInvite(): Collection
    {
        return $this->invite;
    }

    public function addInvite(invites $invite): self
    {
        if (!$this->invite->contains($invite)) {
            $this->invite[] = $invite;
            $invite->setEvenements($this);
        }

        return $this;
    }

    public function removeInvite(invites $invite): self
    {
        if ($this->invite->removeElement($invite)) {
            // set the owning side to null (unless already changed)
            if ($invite->getEvenements() === $this) {
                $invite->setEvenements(null);
            }
        }

        return $this;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
