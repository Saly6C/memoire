<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
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
    private $nomPatient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressePatient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephonePatient;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hospitalisation", mappedBy="patient")
     */
    private $hospitalisations;

    public function __construct()
    {
        $this->hospitalisations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPatient(): ?string
    {
        return $this->nomPatient;
    }

    public function setNomPatient(string $nomPatient): self
    {
        $this->nomPatient = $nomPatient;

        return $this;
    }

    public function getAdressePatient(): ?string
    {
        return $this->adressePatient;
    }

    public function setAdressePatient(string $adressePatient): self
    {
        $this->adressePatient = $adressePatient;

        return $this;
    }

    public function getTelephonePatient(): ?string
    {
        return $this->telephonePatient;
    }

    public function setTelephonePatient(string $telephonePatient): self
    {
        $this->telephonePatient = $telephonePatient;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|Hospitalisation[]
     */
    public function getHospitalisations(): Collection
    {
        return $this->hospitalisations;
    }

    public function addHospitalisation(Hospitalisation $hospitalisation): self
    {
        if (!$this->hospitalisations->contains($hospitalisation)) {
            $this->hospitalisations[] = $hospitalisation;
            $hospitalisation->setPatient($this);
        }

        return $this;
    }

    public function removeHospitalisation(Hospitalisation $hospitalisation): self
    {
        if ($this->hospitalisations->contains($hospitalisation)) {
            $this->hospitalisations->removeElement($hospitalisation);
            // set the owning side to null (unless already changed)
            if ($hospitalisation->getPatient() === $this) {
                $hospitalisation->setPatient(null);
            }
        }

        return $this;
    }
}
