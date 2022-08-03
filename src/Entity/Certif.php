<?php

namespace App\Entity;

use App\Repository\CertifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertifRepository::class)]
class Certif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nomcertificateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcertificateur(): ?string
    {
        return $this->nomcertificateur;
    }

    public function setNomcertificateur(string $nomcertificateur): self
    {
        $this->nomcertificateur = $nomcertificateur;

        return $this;
    }
}
