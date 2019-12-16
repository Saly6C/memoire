<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsultationRepository")
 */
class Consultation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateConsultation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diagnostic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prochainRV;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autre;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Facturation", mappedBy="consultation", cascade={"persist", "remove"})
     */
    private $facturation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="consultations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsultation(): ?\DateTimeInterface
    {
        return $this->dateConsultation;
    }

    public function setDateConsultation(\DateTimeInterface $dateConsultation): self
    {
        $this->dateConsultation = $dateConsultation;

        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): self
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    public function getProchainRV(): ?string
    {
        return $this->prochainRV;
    }

    public function setProchainRV(string $prochainRV): self
    {
        $this->prochainRV = $prochainRV;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(string $autre): self
    {
        $this->autre = $autre;

        return $this;
    }

    public function getFacturation(): ?Facturation
    {
        return $this->facturation;
    }

    public function setFacturation(Facturation $facturation): self
    {
        $this->facturation = $facturation;

        // set the owning side of the relation if necessary
        if ($facturation->getConsultation() !== $this) {
            $facturation->setConsultation($this);
        }

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
