<?php

namespace App\Entity;

use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\UserImageController;
use App\Controller\ProfilController;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[
    ApiResource(
        collectionOperations: [
            "get" => [
                "normalization_context" => ['groups' => ['user:list']]
            ],
            "post" => [
                "denormalization_context" => ['groups' => ['user:write']]
            ],
            "profil" => [
                'pagination_enabled' => false,
                'method' => 'GET',
                'path' => '/profil',
                'controller' => ProfilController::class,
                "normalization_context" => ['groups' => ['user:profil']]

            ],
        ],
        itemOperations: [
            "get" => [
                "normalization_context" => ["groups" => ['user:item']]
            ],
            "put" => [
                "normalization_context" => ["groups" => ['user:put']]
            ],
            "patch",
            "delete",
            "profilPicture" => [
                'method' => 'POST',
                'path'   => 'imageUser/{id}',
                'deserialize' => false,
                'controller' => UserImageController::class
            ]
        ],

    ),
]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["user:list", "user:item", 'article:list', 'article:item', 'user:profil'])]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(["user:item", "user:write", "user:profil", "user:put", "article:item"])]
    private $email;

    #[ORM\Column(type: 'json')]
    #[Groups(["user:write",  'user:profil'])]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:list", "user:item", 'article:list', 'article:item', "user:write", "user:profil", "user:put"])]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:list", "user:item", 'article:list', 'article:item', "user:write", "user:profil", "user:put"])]
    private $lastName;

    #[ORM\Column(type: 'integer')]
    #[Groups(["user:profil", "user:put", 'article:item'])]
    private $point = 0;

    #[ORM\Column(type: 'float')]
    #[Groups(["user:profil", "user:put", 'article:item'])]
    private $solde = 0;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(["user:item", "user:profil"], "user:put")]
    private $bio;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Article::class)]
    private $articles;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Address::class)]
    #[Groups(["user:profil", "user:item"])]
    private $addresses;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Order::class)]
    private $orders;

    #[Groups(["user:write", "user:put"])]
    #[SerializedName("password")]
    private $plainPassword;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['article:list', 'article:item', "user:profil", "user:item"])]
    private $imageFilePath;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    /**
     *
     * @var File|null 
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageFilePath")
     * 
     **/
    private $file;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Notification::class)]
    #[Groups(["user:profil"])]
    private $notifications;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->updatedAt = new DateTime();
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }


    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(?int $point): self
    {
        $this->point = $point;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }


    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(?float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setUser($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getUser() === $this) {
                $article->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setUser($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getUser() === $this) {
                $address->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

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

    public function setFile(?File $file): User
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

    /**
     * @return Collection|Notification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setUser($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getUser() === $this) {
                $notification->setUser(null);
            }
        }

        return $this;
    }
}
