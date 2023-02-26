<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $product_image = null;

    #[ORM\Column]
    private ?float $product_price = null;

    #[ORM\Column(length: 255)]
    private ?string $product_category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_advice = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, mappedBy: 'product')]
    private Collection $commandes;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Unit $unit = null;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductImage(): ?string
    {
        return $this->product_image;
    }

    public function setProductImage(string $product_image): self
    {
        $this->product_image = $product_image;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->product_price;
    }

    public function setProductPrice(float $product_price): self
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getProductCategory(): ?string
    {
        return $this->product_category;
    }

    public function setProductCategory(string $product_category): self
    {
        $this->product_category = $product_category;

        return $this;
    }

    public function getProductStock(): ?string
    {
        return $this->product_stock;
    }

    public function setProductStock(?string $product_stock): self
    {
        $this->product_stock = $product_stock;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->product_description;
    }

    public function setProductDescription(?string $product_description): self
    {
        $this->product_description = $product_description;

        return $this;
    }

    public function getProductAdvice(): ?string
    {
        return $this->product_advice;
    }

    public function setProductAdvice(?string $product_advice): self
    {
        $this->product_advice = $product_advice;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->addProduct($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeProduct($this);
        }

        return $this;
    }

    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    public function setUnit(?Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

}
