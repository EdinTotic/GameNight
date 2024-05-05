<?php

namespace App\Entity;

use App\Repository\CreateGNRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreateGNRepository::class)]
class CreateGN
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $gn_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGnName(): ?string
    {
        return $this->gn_name;
    }

    public function setGnName(string $gn_name): static
    {
        $this->gn_name = $gn_name;

        return $this;
    }
}
