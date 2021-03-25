<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductControlRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=ProductControlRepository::class)
 */
class ProductControl
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Control;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="blob")
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="productControls")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateControl(): ?\DateTimeInterface
    {
        return $this->Date_Control;
    }

    public function setDateControl(\DateTimeInterface $Date_Control): self
    {
        $this->Date_Control = $Date_Control;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPhoto()
    {
        return $this->Photo;
    }

    public function setPhoto($Photo): self
    {
        $this->Photo = $Photo;

        return $this;
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

    public function getOrders(): ?Order
    {
        return $this->orders;
    }

    public function setOrders(?Order $orders): self
    {
        $this->orders = $orders;

        return $this;
    }
}
