<?php

namespace App\Entity;

use App\Repository\PtDeCollecteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PtDeCollecteRepository::class)]
class Ptdecollecte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ptcollecteadresse = null;

    #[ORM\Column]
    private ?int $ptcollectetel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPtcollecteadresse(): ?string
    {
        return $this->ptcollecteadresse;
    }

    public function setPtcollecteadresse(string $ptcollecteadresse): self
    {
        $this->ptcollecteadresse = $ptcollecteadresse;

        return $this;
    }

    public function getPtcollectetel(): ?int
    {
        return $this->ptcollectetel;
    }

    public function setPtcollectetel(int $ptcollectetel): self
    {
        $this->ptcollectetel = $ptcollectetel;

        return $this;
    }
}
