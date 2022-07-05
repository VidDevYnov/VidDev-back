<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use App\Controller\ArticleImageController;
use App\Repository\ArticleRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[
    ApiResource(
        paginationItemsPerPage: 1,
        collectionOperations: [
            "get" => [
                "normalization_context" => ['groups' => ['article:list']]
            ],
            "post"
        ],
        itemOperations: [
            "get" => [
                "normalization_context" => ["groups" => ['article:item']]
            ],
            "put",
            "patch",
            "delete",
            "articleImage" => [
                'method' => 'POST',
                'deserialize' => false,
                'path'   => 'imageArticle/{id}',
                'controller' => ArticleImageController::class
            ]
        ],
    ),
    ApiFilter(SearchFilter::class, properties: ['user' => 'exact', 'articleCategory' => 'exact', 'articleSize' => 'exact', 'articleState' => 'exact', 'articleType' => 'exact', 'articleMaterial'  => 'exact', "orderArticle"]),
    ApiFilter(ExistsFilter::class, properties: ["orderArticle"])

]

class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['article:list', 'article:item', "user:profil"])]

    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['article:list', 'article:item'])]
    private $name;


    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['article:list', 'article:item'])]
    private $brand;

    #[ORM\ManyToOne(targetEntity: ArticleSize::class)]
    #[Groups(['article:list', 'article:item'])]
    private $articleSize;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['article:item'])]
    private $description;

    #[ORM\Column(type: 'float')]
    #[Groups(['article:list', 'article:item'])]
    private $price;

    #[ORM\ManyToOne(targetEntity: ArticleState::class)]
    #[Groups(['article:item'])]
    private $articleState;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['article:item'])]
    private $color;

    #[ORM\ManyToOne(targetEntity: ArticleType::class)]
    #[Groups(['article:item'])]
    private $articleType;

    #[ORM\ManyToOne(targetEntity: ArticleMaterial::class)]
    #[Groups(['article:item'])]
    private $articleMaterial;

    #[ORM\ManyToOne(targetEntity: ArticleCategory::class)]
    #[Groups(['article:item'])]
    private $articleCategory;

    #[Groups(['user:item', 'article:item'])]
    #[ORM\ManyToOne(targetEntity: Order::class)]
    private $orderArticle;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'articles')]
    #[Groups(['article:list', 'article:item'])]
    private $user;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['article:list', 'article:item'])]
    private $imageFilePath;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    /**
     *
     * @var File|null 
     * @Vich\UploadableField(mapping="article_image", fileNameProperty="imageFilePath")
     * 
     **/
    private $file;

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


    public function getImageFilePath(): ?string
    {
        return $this->imageFilePath;
    }

    public function setImageFilePath(?string $imageFilePath): self
    {
        $this->imageFilePath = $imageFilePath;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): Article
    {
        $this->file = $file;
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
