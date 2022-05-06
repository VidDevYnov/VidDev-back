<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleMaterialRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleMaterialRepository::class)]
#[ApiResource]
class ArticleMaterial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
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
