<?php

namespace App\Entity;

use App\Repository\CertifiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertifiRepository::class)]
class Certifi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    public $nomcertif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcertificateurs(): ?string
    {
        return $this->nomcertif;
    }

    public function setNomcertificateurs(string $nomcertif): self
    {
        $this->nomcertif= $nomcertif;

        return $this;
    }
}
