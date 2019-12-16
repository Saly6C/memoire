<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChambreRepository")
 */
class Chambre
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
    private $nomChambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrPlace;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hospitalisation", mappedBy="chambre_id")
     */
    private $hospitalisation;

    public function __construct()
    {
        $this->hospitalisation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChambre(): ?string
    {
        return $this->nomChambre;
    }

    public function setNomChambre(string $nomChambre): self
    {
        $this->nomChambre = $nomChambre;

        return $this;
    }

    public function getNbrPlace(): ?int
    {
        return $this->nbrPlace;
    }

    public function setNbrPlace(int $nbrPlace): self
    {
        $this->nbrPlace = $nbrPlace;

        return $this;
    }

    /**
     * @return Collection|Hospitalisation[]
     */
    public function getHospitalisation(): Collection
    {
        return $this->hospitalisation;
    }

    public function addHospitalisation(Hospitalisation $hospitalisation): self
    {
        if (!$this->hospitalisation->contains($hospitalisation)) {
            $this->hospitalisation[] = $hospitalisation;
            $hospitalisation->setChambreId($this);
        }

        return $this;
    }

    public function removeHospitalisation(Hospitalisation $hospitalisation): self
    {
        if ($this->hospitalisation->contains($hospitalisation)) {
            $this->hospitalisation->removeElement($hospitalisation);
            // set the owning side to null (unless already changed)
            if ($hospitalisation->getChambreId() === $this) {
                $hospitalisation->setChambreId(null);
            }
        }

        return $this;
    }
}
