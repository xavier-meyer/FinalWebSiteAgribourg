<?php

namespace App\Entity;

use App\Repository\HistoriqueEntrepriseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueEntrepriseRepository::class)]
class HistoriqueEntreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $histannee = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $histdescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistannee(): ?int
    {
        return $this->histannee;
    }

    public function setHistannee(int $histannee): self
    {
        $this->histannee = $histannee;

        return $this;
    }

    public function getHistdescription(): ?string
    {
        return $this->histdescription;
    }

    public function setHistdescription(string $histdescription): self
    {
        $this->histdescription = $histdescription;

        return $this;
    }
}
