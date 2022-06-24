<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleStateRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleStateRepository::class)]
#[ApiResource]
class ArticleState
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['article:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['article:item'])]
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
