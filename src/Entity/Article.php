<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $artnomproduit = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $artimage = null;

    #[ORM\Column(nullable: true)]
    private ?float $artprixaukg = null;

    #[ORM\Column]
    private ?float $artprixht = null;

    #[ORM\Column]
    private ?float $artprixttc = null;

    #[ORM\Column(nullable: true)]
    private ?float $artquantite = null;

    #[ORM\Column(nullable: true)]
    private ?int $artnbproduits = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $artdescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $artcmdmini = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $artconseils = null;

    #[ORM\Column(nullable: true)]
    private ?float $artremise = null;

    #[ORM\Column(nullable: true)]
    private ?float $artprixpromo = null;

    #[ORM\Column(nullable: true)]
    private ?float $artprixunitaire = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $artdisponibilite = null;

    #[ORM\Column]
    private ?int $catproduit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtnomproduit(): ?string
    {
        return $this->artnomproduit;
    }

    public function setArtnomproduit(string $artnomproduit): self
    {
        $this->artnomproduit = $artnomproduit;

        return $this;
    }

    public function getArtimage(): ?string
    {
        return $this->artimage;
    }

    public function setArtimage(string $artimage): self
    {
        $this->artimage = $artimage;

        return $this;
    }

    public function getArtprixaukg(): ?float
    {
        return $this->artprixaukg;
    }

    public function setArtprixaukg(?float $artprixaukg): self
    {
        $this->artprixaukg = $artprixaukg;

        return $this;
    }

    public function getArtprixht(): ?float
    {
        return $this->artprixht;
    }

    public function setArtprixht(float $artprixht): self
    {
        $this->artprixht = $artprixht;

        return $this;
    }

    public function getArtprixttc(): ?float
    {
        return $this->artprixttc;
    }

    public function setArtprixttc(float $artprixttc): self
    {
        $this->artprixttc = $artprixttc;

        return $this;
    }

    public function getArtquantite(): ?float
    {
        return $this->artquantite;
    }

    public function setArtquantite(?float $artquantite): self
    {
        $this->artquantite = $artquantite;

        return $this;
    }

    public function getArtnbproduits(): ?int
    {
        return $this->artnbproduits;
    }

    public function setArtnbproduits(?int $artnbproduits): self
    {
        $this->artnbproduits = $artnbproduits;

        return $this;
    }

    public function getArtdescription(): ?string
    {
        return $this->artdescription;
    }

    public function setArtdescription(string $artdescription): self
    {
        $this->artdescription = $artdescription;

        return $this;
    }

    public function getArtcmdmini(): ?string
    {
        return $this->artcmdmini;
    }

    public function setArtcmdmini(string $artcmdmini): self
    {
        $this->artcmdmini = $artcmdmini;

        return $this;
    }

    public function getArtconseils(): ?string
    {
        return $this->artconseils;
    }

    public function setArtconseils(string $artconseils): self
    {
        $this->artconseils = $artconseils;

        return $this;
    }

    public function getArtremise(): ?float
    {
        return $this->artremise;
    }

    public function setArtremise(?float $artremise): self
    {
        $this->artremise = $artremise;

        return $this;
    }

    public function getArtprixpromo(): ?float
    {
        return $this->artprixpromo;
    }

    public function setArtprixpromo(?float $artprixpromo): self
    {
        $this->artprixpromo = $artprixpromo;

        return $this;
    }

    public function getArtprixunitaire(): ?float
    {
        return $this->artprixunitaire;
    }

    public function setArtprixunitaire(?float $artprixunitaire): self
    {
        $this->artprixunitaire = $artprixunitaire;

        return $this;
    }

    public function getArtdisponibilite(): ?string
    {
        return $this->artdisponibilite;
    }

    public function setArtdisponibilite(?string $artdisponibilite): self
    {
        $this->artdisponibilite = $artdisponibilite;

        return $this;
    }

    public function getCatproduit(): ?int
    {
        return $this->catproduit;
    }

    public function setCatproduit(int $catproduit): self
    {
        $this->catproduit = $catproduit;

        return $this;
    }
}
