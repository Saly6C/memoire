<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnelRepository")
 */
class Personnel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fonction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressePersonnel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephonePersonnel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomPersonnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getAdressePersonnel(): ?string
    {
        return $this->adressePersonnel;
    }

    public function setAdressePersonnel(string $adressePersonnel): self
    {
        $this->adressePersonnel = $adressePersonnel;

        return $this;
    }

    public function getTelephonePersonnel(): ?string
    {
        return $this->telephonePersonnel;
    }

    public function setTelephonePersonnel(string $telephonePersonnel): self
    {
        $this->telephonePersonnel = $telephonePersonnel;

        return $this;
    }

    public function getNomPersonnel(): ?string
    {
        return $this->nomPersonnel;
    }

    public function setNomPersonnel(string $nomPersonnel): self
    {
        $this->nomPersonnel = $nomPersonnel;

        return $this;
    }
}
