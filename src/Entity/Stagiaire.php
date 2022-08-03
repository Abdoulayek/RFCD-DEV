<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nomstagiaire;

    #[ORM\OneToMany(mappedBy: 'stagiaireId', targetEntity: StagiaireType::class)]
    private $stagiaireTypes;

    public function __construct()
    {
        $this->stagiaireTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomstagiaire(): ?string
    {
        return $this->nomstagiaire;
    }

    public function setNomstagiaire(string $nomstagiaire): self
    {
        $this->nomstagiaire = $nomstagiaire;

        return $this;
    }

    /**
     * @return Collection<int, StagiaireType>
     */
    public function getStagiaireTypes(): Collection
    {
        return $this->stagiaireTypes;
    }

    public function addStagiaireType(StagiaireType $stagiaireType): self
    {
        if (!$this->stagiaireTypes->contains($stagiaireType)) {
            $this->stagiaireTypes[] = $stagiaireType;
            $stagiaireType->setStagiaireId($this);
        }

        return $this;
    }

    public function removeStagiaireType(StagiaireType $stagiaireType): self
    {
        if ($this->stagiaireTypes->removeElement($stagiaireType)) {
            // set the owning side to null (unless already changed)
            if ($stagiaireType->getStagiaireId() === $this) {
                $stagiaireType->setStagiaireId(null);
            }
        }

        return $this;
    }
}
