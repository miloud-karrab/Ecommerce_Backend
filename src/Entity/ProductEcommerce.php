<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductEcommerceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=ProductEcommerceRepository::class)
 */
class ProductEcommerce
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
    private $Name;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="date")
     */
    private $Creation_Date;

    /**
     * @ORM\Column(type="float")
     */
    private $Promotion_Price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marque;

    /**
     * @ORM\Column(type="blob")
     */
    private $Image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="productEcommerces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="productecommerce")
     */
    private $promotions;

    /**
     * @ORM\ManyToMany(targetEntity=Order::class, inversedBy="productEcommerces")
     */
    private $orders;

    /**
     * @ORM\ManyToMany(targetEntity=AvailabilityPlace::class, inversedBy="productEcommerces")
     */
    private $availabilityplace;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->availabilityplace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->Creation_Date;
    }

    public function setCreationDate(\DateTimeInterface $Creation_Date): self
    {
        $this->Creation_Date = $Creation_Date;

        return $this;
    }

    public function getPromotionPrice(): ?float
    {
        return $this->Promotion_Price;
    }

    public function setPromotionPrice(float $Promotion_Price): self
    {
        $this->Promotion_Price = $Promotion_Price;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Promotion[]
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->setProductecommerce($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getProductecommerce() === $this) {
                $promotion->setProductecommerce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        $this->orders->removeElement($order);

        return $this;
    }

    /**
     * @return Collection|AvailabilityPlace[]
     */
    public function getAvailabilityplace(): Collection
    {
        return $this->availabilityplace;
    }

    public function addAvailabilityplace(AvailabilityPlace $availabilityplace): self
    {
        if (!$this->availabilityplace->contains($availabilityplace)) {
            $this->availabilityplace[] = $availabilityplace;
        }

        return $this;
    }

    public function removeAvailabilityplace(AvailabilityPlace $availabilityplace): self
    {
        $this->availabilityplace->removeElement($availabilityplace);

        return $this;
    }
}
