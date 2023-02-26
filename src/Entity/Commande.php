<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?float $command_product_quantity = null;

    #[ORM\Column]
    private ?float $command_product_total_price = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $command_product_date = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'commandes')]
    private Collection $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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


    public function getCommandProductDate(): ?\DateTimeImmutable
    {
        return $this->command_product_date;
    }

    public function setCommandProductDate(\DateTimeImmutable $command_product_date): self
    {
        $this->command_product_date = $command_product_date;

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

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->product->removeElement($product);

        return $this;
    }
}

