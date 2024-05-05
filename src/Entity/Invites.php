<?php

namespace App\Entity;

use App\Repository\InvitesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvitesRepository::class)]
class Invites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'invites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $fk_user_inviter = null;

    #[ORM\ManyToOne(inversedBy: 'invites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $fk_user_invitee = null;

    #[ORM\ManyToOne(inversedBy: 'invites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gamenight $fk_gamenight_id = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkUserInviter(): ?User
    {
        return $this->fk_user_inviter;
    }

    public function setFkUserInviter(?User $fk_user_inviter): static
    {
        $this->fk_user_inviter = $fk_user_inviter;

        return $this;
    }

    public function getFkUserInvitee(): ?User
    {
        return $this->fk_user_invitee;
    }

    public function setFkUserInvitee(?User $fk_user_invitee): static
    {
        $this->fk_user_invitee = $fk_user_invitee;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
