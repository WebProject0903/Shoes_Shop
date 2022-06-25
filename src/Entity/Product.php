<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
     * @ORM\Column(type="string", length=255)
     */
    private $Images;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Detail;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetail::class, mappedBy="Product_ID")
     */
    private $OrderDetail_ID;

    /**
     * @ORM\OneToMany(targetEntity=Cart::class, mappedBy="Product_ID")
     */
    private $Cart_ID;

    /**
     * @ORM\ManyToOne(targetEntity=Supplier::class, inversedBy="Product_ID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Supplier;

    public function __construct()
    {
        $this->OrderDetail_ID = new ArrayCollection();
        $this->Cart_ID = new ArrayCollection();
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

    public function getImages(): ?string
    {
        return $this->Images;
    }

    public function setImages(string $Images): self
    {
        $this->Images = $Images;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->Detail;
    }

    public function setDetail(string $Detail): self
    {
        $this->Detail = $Detail;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetail>
     */
    public function getOrderDetailID(): Collection
    {
        return $this->OrderDetail_ID;
    }

    public function addOrderDetailID(OrderDetail $orderDetailID): self
    {
        if (!$this->OrderDetail_ID->contains($orderDetailID)) {
            $this->OrderDetail_ID[] = $orderDetailID;
            $orderDetailID->setProductID($this);
        }

        return $this;
    }

    public function removeOrderDetailID(OrderDetail $orderDetailID): self
    {
        if ($this->OrderDetail_ID->removeElement($orderDetailID)) {
            // set the owning side to null (unless already changed)
            if ($orderDetailID->getProductID() === $this) {
                $orderDetailID->setProductID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getCartID(): Collection
    {
        return $this->Cart_ID;
    }

    public function addCartID(Cart $cartID): self
    {
        if (!$this->Cart_ID->contains($cartID)) {
            $this->Cart_ID[] = $cartID;
            $cartID->setProductID($this);
        }

        return $this;
    }

    public function removeCartID(Cart $cartID): self
    {
        if ($this->Cart_ID->removeElement($cartID)) {
            // set the owning side to null (unless already changed)
            if ($cartID->getProductID() === $this) {
                $cartID->setProductID(null);
            }
        }

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->Supplier;
    }

    public function setSupplier(?Supplier $Supplier): self
    {
        $this->Supplier = $Supplier;

        return $this;
    }
}
