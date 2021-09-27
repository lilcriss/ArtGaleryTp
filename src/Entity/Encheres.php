<?php

namespace App\Entity;

use App\Repository\EncheresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EncheresRepository::class)
 */
class Encheres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Oeuvres::class, inversedBy="enchere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oeuvres;

    /**
     * @ORM\ManyToMany(targetEntity=Invites::class, mappedBy="prix")
     */
    private $no;

    public function __construct()
    {
        $this->no = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOeuvres(): ?Oeuvres
    {
        return $this->oeuvres;
    }

    public function setOeuvres(?Oeuvres $oeuvres): self
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    /**
     * @return Collection|Invites[]
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function addNo(Invites $no): self
    {
        if (!$this->no->contains($no)) {
            $this->no[] = $no;
            $no->addPrix($this);
        }

        return $this;
    }

    public function removeNo(Invites $no): self
    {
        if ($this->no->removeElement($no)) {
            $no->removePrix($this);
        }

        return $this;
    }
}
