<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[ApiResource]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["user:profil"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:profil"])]
    private $postalCode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:profil", "user:item"])]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:profil", "user:item"])]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:profil"])]
    private $address;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'addresses')]
    private $user;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:profil"])]
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
