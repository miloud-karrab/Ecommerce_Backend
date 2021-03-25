<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
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
    private $State;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Start_Time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $End_Time;

    /**
     * @ORM\Column(type="float")
     */
    private $Total;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Destination;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=ProductControl::class, mappedBy="orders")
     */
    private $productControls;

    /**
     * @ORM\ManyToMany(targetEntity=ProductEcommerce::class, mappedBy="orders")
     */
    private $productEcommerces;

    public function __construct()
    {
        $this->productControls = new ArrayCollection();
        $this->productEcommerces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->State;
    }

    public function setState(string $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->Start_Time;
    }

    public function setStartTime(\DateTimeInterface $Start_Time): self
    {
        $this->Start_Time = $Start_Time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->End_Time;
    }

    public function setEndTime(\DateTimeInterface $End_Time): self
    {
        $this->End_Time = $End_Time;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->Total;
    }

    public function setTotal(float $Total): self
    {
        $this->Total = $Total;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->Destination;
    }

    public function setDestination(string $Destination): self
    {
        $this->Destination = $Destination;

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
     * @return Collection|ProductControl[]
     */
    public function getProductControls(): Collection
    {
        return $this->productControls;
    }

    public function addProductControl(ProductControl $productControl): self
    {
        if (!$this->productControls->contains($productControl)) {
            $this->productControls[] = $productControl;
            $productControl->setOrders($this);
        }

        return $this;
    }

    public function removeProductControl(ProductControl $productControl): self
    {
        if ($this->productControls->removeElement($productControl)) {
            // set the owning side to null (unless already changed)
            if ($productControl->getOrders() === $this) {
                $productControl->setOrders(null);
            }
        }

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
            $productEcommerce->addOrder($this);
        }

        return $this;
    }

    public function removeProductEcommerce(ProductEcommerce $productEcommerce): self
    {
        if ($this->productEcommerces->removeElement($productEcommerce)) {
            $productEcommerce->removeOrder($this);
        }

        return $this;
    }
}
