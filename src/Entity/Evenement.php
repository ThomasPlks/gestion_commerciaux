<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $evenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Conclusion;

    /**
     * @ORM\Column(type="integer")
     */
    private $KmParcourus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateArrivee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDepart;

    /**
     * @ORM\ManyToOne(targetEntity=TypeEvenement::class, inversedBy="evenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeEvenement;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="evenement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="evenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commercial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEvenement(): ?string
    {
        return $this->evenement;
    }

    public function setEvenement(string $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getConclusion(): ?string
    {
        return $this->Conclusion;
    }

    public function setConclusion(string $Conclusion): self
    {
        $this->Conclusion = $Conclusion;

        return $this;
    }

    public function getKmParcourus(): ?int
    {
        return $this->KmParcourus;
    }

    public function setKmParcourus(int $KmParcourus): self
    {
        $this->KmParcourus = $KmParcourus;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->DateArrivee;
    }

    public function setDateArrivee(\DateTimeInterface $DateArrivee): self
    {
        $this->DateArrivee = $DateArrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->DateDepart;
    }

    public function setDateDepart(\DateTimeInterface $DateDepart): self
    {
        $this->DateDepart = $DateDepart;

        return $this;
    }

    public function getTypeEvenement(): ?TypeEvenement
    {
        return $this->TypeEvenement;
    }

    public function setTypeEvenement(?TypeEvenement $TypeEvenement): self
    {
        $this->TypeEvenement = $TypeEvenement;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getCommercial(): ?User
    {
        return $this->commercial;
    }

    public function setCommercial(?User $commercial): self
    {
        $this->commercial = $commercial;

        return $this;
    }

    public function __toString(): string
    {
        return $this->Titre;
    }
}
