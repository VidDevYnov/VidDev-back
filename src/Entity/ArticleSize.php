<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleSizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArticleSizeRepository::class)
 */
class ArticleSize
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
    private $worded;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorded(): ?string
    {
        return $this->worded;
    }

    public function setWorded(string $worded): self
    {
        $this->worded = $worded;

        return $this;
    }
}
