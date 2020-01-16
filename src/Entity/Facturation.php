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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montantPaye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomAssurance;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Hospitalisation", mappedBy="facturation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hospitalisation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Consultation", inversedBy="facturation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $consultation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $remise;

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

    public function getHospitalisation(): ?Hospitalisation
    {
        return $this->hospitalisation;
    }

    public function setHospitalisation(Hospitalisation $hospitalisation): self
    {
        $this->hospitalisation = $hospitalisation;

        // set the owning side of the relation if necessary
        if ($hospitalisation->getFacturation() !== $this) {
            $hospitalisation->setFacturation($this);
        }

        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(Consultation $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(?int $remise): self
    {
        $this->remise = $remise;

        return $this;
    }
}
