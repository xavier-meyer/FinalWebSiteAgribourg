<?php

namespace App\Entity;

use App\Repository\ProductRepository;
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
    private?string $product_price_unit = null;

    #[ORM\Column(length: 255)]
    private ?string $product_category = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_advice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getproduct_name(): ?string
    {
        return $this->product_name;
    }

    public function getproductname(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getproduct_image(): ?string
    {
        return $this->product_image;
    }

    public function getproductimage(): ?string
    {
        return $this->product_image;
    }

    public function setProductImage(string $product_image): self
    {
        $this->product_image = $product_image;

        return $this;
    }

    public function getprice(): ?float
    {
        return $this->product_price;
    }

    public function getproduct_price(): ?float
    {
        return $this->product_price;
    }

    public function setProductPrice(float $product_price): self
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getprice_unit(): ?string
    {
        return $this->product_price_unit;
    }

    public function getproduct_price_unit(): ?string
    {
        return $this->product_price_unit;
    }

    public function setProductPriceUnit(string $product_price_unit): self
    {
        $this->product_price_unit = $product_price_unit;

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

    public function getProduct_description(): ?string
    {
        return $this->product_description;
    }

    public function setProductDescription(?string $product_description): self
    {
        $this->product_description = $product_description;

        return $this;
    }

    public function getProduct_advice(): ?string
    {
        return $this->product_advice;
    }

    public function setProductAdvice(?string $product_advice): self
    {
        $this->product_advice = $product_advice;

        return $this;
    }
}
