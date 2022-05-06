<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource(
        collectionOperations: ['get' => ['normalization_context' => ['groups' => 'article:list']]],
        itemOperations: ['get' => ['normalization_context' => ['groups' => 'article:item']]],
        paginationEnabled: false,
    )]

class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['article:list', 'article:item' ,"user_details_read"])]

    private $id;

    #[Groups(["user_details_read"])]

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['article:list', 'article:item'])]
    private $name;

    #[Groups(["user_details_read"])]

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['article:list', 'article:item'])]
    private $brand;

    #[Groups(["user_details_read"])]

    #[ORM\ManyToOne(targetEntity: ArticleSize::class)]
    #[Groups(['article:list', 'article:item'])]
    private $articleSize;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[Groups(["user_details_read"])]

    #[ORM\Column(type: 'float')]
    #[Groups(['article:list', 'article:item'])]
    private $price;

    #[ORM\ManyToOne(targetEntity: ArticleState::class)]
    private $articleState;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $color;

    #[ORM\ManyToOne(targetEntity: ArticleType::class)]
    private $articleType;

    #[ORM\ManyToOne(targetEntity: ArticleMaterial::class)]
    private $articleMaterial;

    #[ORM\ManyToOne(targetEntity: ArticleCategory::class)]
    private $articleCategory;

    #[ORM\ManyToOne(targetEntity: Order::class)]
    private $orderArticle;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'articles')]
    private $user;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Image::class)]
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

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
        return $this->articleSize;
    }

    public function setArticleSize(?ArticleSize $articleSize): self
    {
        $this->articleSize = $articleSize;

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
        return $this->articleState;
    }

    public function setArticleState(?ArticleState $articleState): self
    {
        $this->articleState = $articleState;

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
        return $this->articleType;
    }

    public function setArticleType(?ArticleType $articleType): self
    {
        $this->articleType = $articleType;

        return $this;
    }

    public function getArticleMaterial(): ?ArticleMaterial
    {
        return $this->articleMaterial;
    }

    public function setArticleMaterial(?ArticleMaterial $articleMaterial): self
    {
        $this->articleMaterial = $articleMaterial;

        return $this;
    }

    public function getArticleCategory(): ?ArticleCategory
    {
        return $this->articleCategory;
    }

    public function setArticleCategory(?ArticleCategory $articleCategory): self
    {
        $this->articleCategory = $articleCategory;

        return $this;
    }

    public function getOrderArticle(): ?Order
    {
        return $this->orderArticle;
    }

    public function setOrderArticle(?Order $orderArticle): self
    {
        $this->orderArticle = $orderArticle;

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
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setArticle($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getArticle() === $this) {
                $image->setArticle(null);
            }
        }

        return $this;
    }
}
