<?php

namespace App\Entity;

use App\Repository\GamenightParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamenightParticipantRepository::class)]
class GamenightParticipant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightParticipants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $fk_user_id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightParticipants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gamenight $fk_gamenight_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkUserId(): ?User
    {
        return $this->fk_user_id;
    }

    public function setFkUserId(?User $fk_user_id): static
    {
        $this->fk_user_id = $fk_user_id;

        return $this;
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
}
