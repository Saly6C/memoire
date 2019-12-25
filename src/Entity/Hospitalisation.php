<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HospitalisationRepository")
 */
class Hospitalisation
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
    private $dateHospitalisation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chambre", inversedBy="hospitalisation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chambre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="hospitalisations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Facturation", inversedBy="hospitalisation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $facturation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDemandeur;

    /**
     * @ORM\Column(type="array")
     */
    private $pieceDuMalade = [];

    /**
     * @ORM\Column(type="array")
     */
    private $pieceDuDemandeur = [];

    /**
     * @ORM\Column(type="bigint")
     */
    private $numeroPieceMalade;

    /**
     * @ORM\Column(type="bigint")
     */
    private $numeroPieceDemandeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHospitalisation(): ?\DateTimeInterface
    {
        return $this->dateHospitalisation;
    }

    public function setDateHospitalisation(\DateTimeInterface $dateHospitalisation): self
    {
        $this->dateHospitalisation = $dateHospitalisation;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getChambre(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambre(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

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

    public function getFacturation(): ?Facturation
    {
        return $this->facturation;
    }

    public function setFacturation(Facturation $facturation): self
    {
        $this->facturation = $facturation;

        return $this;
    }

    public function getNomDemandeur(): ?string
    {
        return $this->nomDemandeur;
    }

    public function setNomDemandeur(string $nomDemandeur): self
    {
        $this->nomDemandeur = $nomDemandeur;

        return $this;
    }

    public function getPieceDuMalade(): ?array
    {
        return $this->pieceDuMalade;
    }

    public function setPieceDuMalade(array $pieceDuMalade): self
    {
        $this->pieceDuMalade = $pieceDuMalade;

        return $this;
    }

    public function getPieceDuDemandeur(): ?array
    {
        return $this->pieceDuDemandeur;
    }

    public function setPieceDuDemandeur(array $pieceDuDemandeur): self
    {
        $this->pieceDuDemandeur = $pieceDuDemandeur;

        return $this;
    }

    public function getNumeroPieceMalade(): ?int
    {
        return $this->numeroPieceMalade;
    }

    public function setNumeroPieceMalade(int $numeroPieceMalade): self
    {
        $this->numeroPieceMalade = $numeroPieceMalade;

        return $this;
    }

    public function getNumeroPieceDemandeur(): ?int
    {
        return $this->numeroPieceDemandeur;
    }

    public function setNumeroPieceDemandeur(int $numeroPieceDemandeur): self
    {
        $this->numeroPieceDemandeur = $numeroPieceDemandeur;

        return $this;
    }

    public function __toString() {
        return (string)$this->patient;
    }
}
