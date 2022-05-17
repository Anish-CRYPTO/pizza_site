<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'pizzas')]
    #[ORM\JoinColumn(nullable: false)]
    private $category;

    #[ORM\ManyToOne(targetEntity: Size::class, inversedBy: 'pizzas')]
    #[ORM\JoinColumn(nullable: false)]
    private $size;

    #[ORM\OneToMany(mappedBy: 'pizza', targetEntity: Order::class)]
    private $bestelling;

    public function __construct()
    {
        $this->bestelling = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSize(): ?size
    {
        return $this->size;
    }

    public function setSize(?size $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return Collection<int, order>
     */
    public function getBestelling(): Collection
    {
        return $this->bestelling;
    }

    public function addBestelling(order $bestelling): self
    {
        if (!$this->bestelling->contains($bestelling)) {
            $this->bestelling[] = $bestelling;
            $bestelling->setPizza($this);
        }

        return $this;
    }

    public function removeBestelling(order $bestelling): self
    {
        if ($this->bestelling->removeElement($bestelling)) {
            // set the owning side to null (unless already changed)
            if ($bestelling->getPizza() === $this) {
                $bestelling->setPizza(null);
            }
        }

        return $this;
    }
}
