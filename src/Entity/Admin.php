<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
    private $pass;

    /**
     * @ORM\OneToMany(targetEntity=evenements::class, mappedBy="admin")
     */
    private $administrator;

    public function __construct()
    {
        $this->administrator = new ArrayCollection();
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

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return Collection|evenements[]
     */
    public function getAdministrator(): Collection
    {
        return $this->administrator;
    }

    public function addAdministrator(evenements $administrator): self
    {
        if (!$this->administrator->contains($administrator)) {
            $this->administrator[] = $administrator;
            $administrator->setAdmin($this);
        }

        return $this;
    }

    public function removeAdministrator(evenements $administrator): self
    {
        if ($this->administrator->removeElement($administrator)) {
            // set the owning side to null (unless already changed)
            if ($administrator->getAdmin() === $this) {
                $administrator->setAdmin(null);
            }
        }

        return $this;
    }
}
