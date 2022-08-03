<?php

namespace App\Entity;

use App\Repository\StagiaireTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagiaireTypeRepository::class)]
class StagiaireType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Stagiaire::class, inversedBy: 'stagiaireTypes')]
    private $stagiaireId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStagiaireId(): ?Stagiaire
    {
        return $this->stagiaireId;
    }

    public function setStagiaireId(?Stagiaire $stagiaireId): self
    {
        $this->stagiaireId = $stagiaireId;

        return $this;
    }
}
