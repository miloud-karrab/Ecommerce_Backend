<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AvailabilityPlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=AvailabilityPlaceRepository::class)
 */
class AvailabilityPlace
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
    private $Country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $City;

    /**
     * @ORM\ManyToMany(targetEntity=ProductEcommerce::class, mappedBy="availabilityplace")
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

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

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
            $productEcommerce->addAvailabilityplace($this);
        }

        return $this;
    }

    public function removeProductEcommerce(ProductEcommerce $productEcommerce): self
    {
        if ($this->productEcommerces->removeElement($productEcommerce)) {
            $productEcommerce->removeAvailabilityplace($this);
        }

        return $this;
    }
}
