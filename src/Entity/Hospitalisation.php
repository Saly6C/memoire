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

    public function getChambreId(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambreId(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }
}
