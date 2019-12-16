<?php

namespace App\Entity;

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
}
