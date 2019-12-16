<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DossierPatientRepository")
 */
class DossierPatient
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
    private $nomMaladie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $antecedant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMaladie(): ?string
    {
        return $this->nomMaladie;
    }

    public function setNomMaladie(string $nomMaladie): self
    {
        $this->nomMaladie = $nomMaladie;

        return $this;
    }

    public function getAntecedant(): ?string
    {
        return $this->antecedant;
    }

    public function setAntecedant(string $antecedant): self
    {
        $this->antecedant = $antecedant;

        return $this;
    }
}
