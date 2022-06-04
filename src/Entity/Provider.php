<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 */
class Provider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $cif;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name_enterprise;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $person_contact;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="provider")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): self
    {
        $this->cif = $cif;

        return $this;
    }

    public function getNameEnterprise(): ?string
    {
        return $this->name_enterprise;
    }

    public function setNameEnterprise(string $name_enterprise): self
    {
        $this->name_enterprise = $name_enterprise;

        return $this;
    }

    public function getPersonContact(): ?string
    {
        return $this->person_contact;
    }

    public function setPersonContact(string $person_contact): self
    {
        $this->person_contact = $person_contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setProvider($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProvider() === $this) {
                $product->setProvider(null);
            }
        }

        return $this;
    }
}
