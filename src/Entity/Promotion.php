<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $Pourcentage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Start_Time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $End_Date;

    /**
     * @ORM\ManyToOne(targetEntity=ProductEcommerce::class, inversedBy="promotions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productecommerce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPourcentage(): ?float
    {
        return $this->Pourcentage;
    }

    public function setPourcentage(float $Pourcentage): self
    {
        $this->Pourcentage = $Pourcentage;

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

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->End_Date;
    }

    public function setEndDate(\DateTimeInterface $End_Date): self
    {
        $this->End_Date = $End_Date;

        return $this;
    }

    public function getProductecommerce(): ?ProductEcommerce
    {
        return $this->productecommerce;
    }

    public function setProductecommerce(?ProductEcommerce $productecommerce): self
    {
        $this->productecommerce = $productecommerce;

        return $this;
    }
}
