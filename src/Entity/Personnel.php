<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consultation", mappedBy="personnel")
     */
    private $consultations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="personnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $service;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
    }

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

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations[] = $consultation;
            $consultation->setPersonnel($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->contains($consultation)) {
            $this->consultations->removeElement($consultation);
            // set the owning side to null (unless already changed)
            if ($consultation->getPersonnel() === $this) {
                $consultation->setPersonnel(null);
            }
        }

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }
}
