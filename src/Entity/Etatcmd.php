<?php

namespace App\Entity;

use App\Repository\EtatcmdRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatcmdRepository::class)]
class Etatcmd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $etatcmdstep = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatcmdstep(): ?int
    {
        return $this->etatcmdstep;
    }

    public function setEtatcmdstep(int $etatcmdstep): self
    {
        $this->etatcmdstep = $etatcmdstep;

        return $this;
    }
}

