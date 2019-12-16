<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturationRepository")
 */
class Facturation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantFacture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $priseEnCharge;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantPaye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomAssurance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantFacture(): ?int
    {
        return $this->montantFacture;
    }

    public function setMontantFacture(int $montantFacture): self
    {
        $this->montantFacture = $montantFacture;

        return $this;
    }

    public function getPriseEnCharge(): ?bool
    {
        return $this->priseEnCharge;
    }

    public function setPriseEnCharge(bool $priseEnCharge): self
    {
        $this->priseEnCharge = $priseEnCharge;

        return $this;
    }

    public function getMontantPaye(): ?int
    {
        return $this->montantPaye;
    }

    public function setMontantPaye(int $montantPaye): self
    {
        $this->montantPaye = $montantPaye;

        return $this;
    }

    public function getNomAssurance(): ?string
    {
        return $this->nomAssurance;
    }

    public function setNomAssurance(string $nomAssurance): self
    {
        $this->nomAssurance = $nomAssurance;

        return $this;
    }
}
