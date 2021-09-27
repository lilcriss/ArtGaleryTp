<?php

namespace App\Entity;

use App\Repository\OeuvresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OeuvresRepository::class)
 */
class Oeuvres
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
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Evenements::class, inversedBy="oeuvre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenement;

    /**
     * @ORM\OneToMany(targetEntity=encheres::class, mappedBy="oeuvres")
     */
    private $enchere;

    /**
     * @ORM\OneToOne(targetEntity=photos::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $photo;

    public function __construct()
    {
        $this->enchere = new ArrayCollection();
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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEvenement(): ?Evenements
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenements $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * @return Collection|encheres[]
     */
    public function getEnchere(): Collection
    {
        return $this->enchere;
    }

    public function addEnchere(encheres $enchere): self
    {
        if (!$this->enchere->contains($enchere)) {
            $this->enchere[] = $enchere;
            $enchere->setOeuvres($this);
        }

        return $this;
    }

    public function removeEnchere(encheres $enchere): self
    {
        if ($this->enchere->removeElement($enchere)) {
            // set the owning side to null (unless already changed)
            if ($enchere->getOeuvres() === $this) {
                $enchere->setOeuvres(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?photos
    {
        return $this->photo;
    }

    public function setPhoto(photos $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
