<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $command_product_name = null;

    #[ORM\Column]
    private ?float $command_product_price = null;

    #[ORM\Column]
    private ?float $command_product_quantity = null;

//    #[ORM\Column]
//    private ?float $command_product_total_price = null;

    #[ORM\Column(length: 255)]
    private ?string $command_product_price_unit = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $command_product_date = null;

    #[ORM\Column(nullable: true)]
    private ?float $command_total_price = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getcommand_product_name(): ?string
    {
        return $this->command_product_name;
    }

    public function getCommandProductName(): ?string
    {
        return $this->command_product_name;
    }

    public function setCommandProductName(string $command_product_name): self
    {
        $this->command_product_name = $command_product_name;

        return $this;
    }

    public function getCommandProductPrice(): ?float
    {
        return $this->command_product_price;
    }

    public function setCommandProductPrice(float $command_product_price): self
    {
        $this->command_product_price = $command_product_price;

        return $this;
    }

    public function getCommandProductQuantity(): ?float
    {
        return $this->command_product_quantity;
    }

    public function setCommandProductQuantity(float $command_product_quantity): self
    {
        $this->command_product_quantity = $command_product_quantity;

        return $this;
    }

    public function getCommandProductTotalPrice(): ?float
    {
        return $this->command_product_total_price;
    }

    public function setCommandProductTotalPrice(float $command_product_total_price): self
    {
        $this->command_product_total_price = $command_product_total_price;

        return $this;
    }

    public function getCommandProductPriceUnit(): ?string
    {
        return $this->command_product_price_unit;
    }

    public function setCommandProductPriceUnit(string $command_product_price_unit): self
    {
        $this->command_product_price_unit = $command_product_price_unit;

        return $this;
    }

    public function getCommandProductDate(): ?\DateTimeImmutable
    {
        return $this->command_product_date;
    }

    public function setCommandProductDate(\DateTimeImmutable $command_product_date): self
    {
        $this->command_product_date = $command_product_date;

        return $this;
    }

    public function getCommandTotalPrice(): ?float
    {
        return $this->command_total_price;
    }

    public function setCommandTotalPrice(?float $command_total_price): self
    {
        $this->command_total_price = $command_total_price;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

