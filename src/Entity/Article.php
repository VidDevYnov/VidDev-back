<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * paginationItemsPerPage= 50
 * )
 * @ORM\Entity(repositoryClass=Article::class)
 */
class Article
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleSize::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArticleSize;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleState::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArticleState;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArticleType;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleMaterial::class)
     */
    private $ArticleMaterial;

    /**
     * @ORM\ManyToOne(targetEntity=ArticleCategory::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArticleCategory;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="Article")
     */
    private $Order;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getArticleSize(): ?ArticleSize
    {
        return $this->ArticleSize;
    }

    public function setArticleSize(?ArticleSize $ArticleSize): self
    {
        $this->ArticleSize = $ArticleSize;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getArticleState(): ?ArticleState
    {
        return $this->ArticleState;
    }

    public function setArticleState(?ArticleState $ArticleState): self
    {
        $this->ArticleState = $ArticleState;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getArticleType(): ?ArticleType
    {
        return $this->ArticleType;
    }

    public function setArticleType(?ArticleType $ArticleType): self
    {
        $this->ArticleType = $ArticleType;

        return $this;
    }

    public function getArticleMaterial(): ?ArticleMaterial
    {
        return $this->ArticleMaterial;
    }

    public function setArticleMaterial(?ArticleMaterial $ArticleMaterial): self
    {
        $this->ArticleMaterial = $ArticleMaterial;

        return $this;
    }

    public function getArticleCategory(): ?ArticleCategory
    {
        return $this->ArticleCategory;
    }

    public function setArticleCategory(?ArticleCategory $ArticleCategory): self
    {
        $this->ArticleCategory = $ArticleCategory;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->Order;
    }

    public function setOrder(?Order $Order): self
    {
        $this->Order = $Order;

        return $this;
    }
}
