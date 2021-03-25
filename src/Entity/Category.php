<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reference;

    /**
     * @ORM\OneToMany(targetEntity=ProductEcommerce::class, mappedBy="category")
     */
    private $productEcommerces;

    public function __construct()
    {
        $this->productEcommerces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    /**
     * @return Collection|ProductEcommerce[]
     */
    public function getProductEcommerces(): Collection
    {
        return $this->productEcommerces;
    }

    public function addProductEcommerce(ProductEcommerce $productEcommerce): self
    {
        if (!$this->productEcommerces->contains($productEcommerce)) {
            $this->productEcommerces[] = $productEcommerce;
            $productEcommerce->setCategory($this);
        }

        return $this;
    }

    public function removeProductEcommerce(ProductEcommerce $productEcommerce): self
    {
        if ($this->productEcommerces->removeElement($productEcommerce)) {
            // set the owning side to null (unless already changed)
            if ($productEcommerce->getCategory() === $this) {
                $productEcommerce->setCategory(null);
            }
        }

        return $this;
    }
}
