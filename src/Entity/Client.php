<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prénom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nn°Téléphone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=TypeClient::class, inversedBy="clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrénom(): ?string
    {
        return $this->Prénom;
    }

    public function setPrénom(string $Prénom): self
    {
        $this->Prénom = $Prénom;

        return $this;
    }

    public function getNn°Téléphone(): ?int
    {
        return $this->Nn°Téléphone;
    }

    public function setNn°Téléphone(int $Nn°Téléphone): self
    {
        $this->Nn°Téléphone = $Nn°Téléphone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTypeClient(): ?TypeClient
    {
        return $this->TypeClient;
    }

    public function setTypeClient(?TypeClient $TypeClient): self
    {
        $this->TypeClient = $TypeClient;

        return $this;
    }
}
