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

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $command_product_date = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'commandes')]
    private Collection $product;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $command_product_status = null;

    #[ORM\Column(nullable: true)]
    private array $json_command = [];


    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCommand(): array
    {
        return $this->command;
    }

    public function setCommand(array $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function getCommandProductStatus(): ?string
    {
        return $this->command_product_status;
    }

    public function setCommandProductStatus(?string $command_product_status): self
    {
        $this->command_product_status = $command_product_status;

        return $this;
    }

    public function getJsonCommand():array
    {
        return $this->json_command;
    }

    public function setJsonCommand(?array $json_command): self
    {
        $this->json_command = $json_command;

        return $this;
    }

}

