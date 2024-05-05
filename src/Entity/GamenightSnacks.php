<?php

namespace App\Entity;

use App\Repository\GamenightSnacksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamenightSnacksRepository::class)]
class GamenightSnacks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightSnacks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gamenight $fk_gamenight_id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightSnacks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Snacks $fk_snack_id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightSnacks')]
    private ?User $fk_user_Id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkGamenightId(): ?Gamenight
    {
        return $this->fk_gamenight_id;
    }

    public function setFkGamenightId(?Gamenight $fk_gamenight_id): static
    {
        $this->fk_gamenight_id = $fk_gamenight_id;

        return $this;
    }

    public function getFkSnackId(): ?Snacks
    {
        return $this->fk_snack_id;
    }

    public function setFkSnackId(?Snacks $fk_snack_id): static
    {
        $this->fk_snack_id = $fk_snack_id;

        return $this;
    }

    public function getFkUserId(): ?User
    {
        return $this->fk_user_Id;
    }

    public function setFkUserId(?User $fk_user_Id): static
    {
        $this->fk_user_Id = $fk_user_Id;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }
}
