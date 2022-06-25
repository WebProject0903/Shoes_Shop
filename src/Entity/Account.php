<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountRepository::class)
 */
class Account
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $Gender;

    /**
     * @ORM\Column(type="date")
     */
    private $Birthday;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Type;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="Account_ID")
     */
    private $Order_ID;

    /**
     * @ORM\OneToMany(targetEntity=Cart::class, mappedBy="Account_ID")
     */
    private $Cart_Id;

    public function __construct()
    {
        $this->Order_ID = new ArrayCollection();
        $this->Cart_Id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->Fullname;
    }

    public function setFullname(string $Fullname): self
    {
        $this->Fullname = $Fullname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->Birthday;
    }

    public function setBirthday(\DateTimeInterface $Birthday): self
    {
        $this->Birthday = $Birthday;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrderID(): Collection
    {
        return $this->Order_ID;
    }

    public function addOrderID(Order $orderID): self
    {
        if (!$this->Order_ID->contains($orderID)) {
            $this->Order_ID[] = $orderID;
            $orderID->setAccountID($this);
        }

        return $this;
    }

    public function removeOrderID(Order $orderID): self
    {
        if ($this->Order_ID->removeElement($orderID)) {
            // set the owning side to null (unless already changed)
            if ($orderID->getAccountID() === $this) {
                $orderID->setAccountID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getCartId(): Collection
    {
        return $this->Cart_Id;
    }

    public function addCartId(Cart $cartId): self
    {
        if (!$this->Cart_Id->contains($cartId)) {
            $this->Cart_Id[] = $cartId;
            $cartId->setAccountID($this);
        }

        return $this;
    }

    public function removeCartId(Cart $cartId): self
    {
        if ($this->Cart_Id->removeElement($cartId)) {
            // set the owning side to null (unless already changed)
            if ($cartId->getAccountID() === $this) {
                $cartId->setAccountID(null);
            }
        }

        return $this;
    }
}
