<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartRepository::class)
 */
class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity_Pro;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="Cart_ID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Product_ID;

    /**
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="Cart_Id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Account_ID;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantityPro(): ?int
    {
        return $this->Quantity_Pro;
    }

    public function setQuantityPro(int $Quantity_Pro): self
    {
        $this->Quantity_Pro = $Quantity_Pro;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getProductID(): ?Product
    {
        return $this->Product_ID;
    }

    public function setProductID(?Product $Product_ID): self
    {
        $this->Product_ID = $Product_ID;

        return $this;
    }

    public function getAccountID(): ?Account
    {
        return $this->Account_ID;
    }

    public function setAccountID(?Account $Account_ID): self
    {
        $this->Account_ID = $Account_ID;

        return $this;
    }

}
