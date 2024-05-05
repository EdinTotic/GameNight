<?php

namespace App\Entity;

use App\Repository\GamenightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamenightRepository::class)]
class Gamenight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenight_game')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $fk_game_id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenight_creator')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $fk_user_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    private ?string $gn_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $gn_description = null;

    #[ORM\Column(length: 255)]
    private ?string $gn_image = null;

    public $dist;

    /**
     * @var Collection<int, GamenightSnacks>
     */
    #[ORM\OneToMany(targetEntity: GamenightSnacks::class, mappedBy: 'fk_gamenight_id', orphanRemoval: true)]
    private Collection $gamenightSnacks;

    /**
     * @var Collection<int, GamenightTags>
     */
    #[ORM\OneToMany(targetEntity: GamenightTags::class, mappedBy: 'fk_gamenight_id', orphanRemoval: true)]
    private Collection $gamenightTags;

    /**
     * @var Collection<int, Invites>
     */
    #[ORM\OneToMany(targetEntity: Invites::class, mappedBy: 'fk_gamenight_id', orphanRemoval: true)]
    private Collection $invites;

    /**
     * @var Collection<int, GamenightParticipant>
     */
    #[ORM\OneToMany(targetEntity: GamenightParticipant::class, mappedBy: 'fk_gamenight_id', orphanRemoval: true)]
    private Collection $gamenightParticipants;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $lat = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $lng = null;





    public function __construct()
    {
        $this->gamenightSnacks = new ArrayCollection();
        $this->gamenightTags = new ArrayCollection();
        $this->invites = new ArrayCollection();
        $this->gamenightParticipants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkGameId(): ?Game
    {
        return $this->fk_game_id;
    }

    public function setFkGameId(?Game $fk_game_id): static
    {
        $this->fk_game_id = $fk_game_id;

        return $this;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
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

    public function getGnDescription(): ?string
    {
        return $this->gn_description;
    }

    public function setGnDescription(string $gn_description): static
    {
        $this->gn_description = $gn_description;

        return $this;
    }

    public function getGnImage(): ?string
    {
        return $this->gn_image;
    }

    public function setGnImage(string $gn_image): static
    {
        $this->gn_image = $gn_image;

        return $this;
    }

    /**
     * @return Collection<int, GamenightSnacks>
     */
    public function getGamenightSnacks(): Collection
    {
        return $this->gamenightSnacks;
    }

    public function addGamenightSnack(GamenightSnacks $gamenightSnack): static
    {
        if (!$this->gamenightSnacks->contains($gamenightSnack)) {
            $this->gamenightSnacks->add($gamenightSnack);
            $gamenightSnack->setFkGamenightId($this);
        }

        return $this;
    }

    public function removeGamenightSnack(GamenightSnacks $gamenightSnack): static
    {
        if ($this->gamenightSnacks->removeElement($gamenightSnack)) {
            // set the owning side to null (unless already changed)
            if ($gamenightSnack->getFkGamenightId() === $this) {
                $gamenightSnack->setFkGamenightId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GamenightTags>
     */
    public function getGamenightTags(): Collection
    {
        return $this->gamenightTags;
    }

    public function addGamenightTag(GamenightTags $gamenightTag): static
    {
        if (!$this->gamenightTags->contains($gamenightTag)) {
            $this->gamenightTags->add($gamenightTag);
            $gamenightTag->setFkGamenightId($this);
        }

        return $this;
    }

    public function removeGamenightTag(GamenightTags $gamenightTag): static
    {
        if ($this->gamenightTags->removeElement($gamenightTag)) {
            // set the owning side to null (unless already changed)
            if ($gamenightTag->getFkGamenightId() === $this) {
                $gamenightTag->setFkGamenightId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Invites>
     */
    public function getInvites(): Collection
    {
        return $this->invites;
    }

    public function addInvite(Invites $invite): static
    {
        if (!$this->invites->contains($invite)) {
            $this->invites->add($invite);
            $invite->setFkGamenightId($this);
        }

        return $this;
    }

    public function removeInvite(Invites $invite): static
    {
        if ($this->invites->removeElement($invite)) {
            // set the owning side to null (unless already changed)
            if ($invite->getFkGamenightId() === $this) {
                $invite->setFkGamenightId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GamenightParticipant>
     */
    public function getGamenightParticipants(): Collection
    {
        return $this->gamenightParticipants;
    }

    public function addGamenightParticipant(GamenightParticipant $gamenightParticipant): static
    {
        if (!$this->gamenightParticipants->contains($gamenightParticipant)) {
            $this->gamenightParticipants->add($gamenightParticipant);
            $gamenightParticipant->setFkGamenightId($this);
        }

        return $this;
    }

    public function removeGamenightParticipant(GamenightParticipant $gamenightParticipant): static
    {
        if ($this->gamenightParticipants->removeElement($gamenightParticipant)) {
            // set the owning side to null (unless already changed)
            if ($gamenightParticipant->getFkGamenightId() === $this) {
                $gamenightParticipant->setFkGamenightId(null);
            }
        }

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(?string $lat): static
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?string
    {
        return $this->lng;
    }

    public function setLng(?string $lng): static
    {
        $this->lng = $lng;

        return $this;
    }
}
