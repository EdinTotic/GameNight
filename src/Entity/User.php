<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $username = null;

    #[ORM\Column(length: 100)]
    private ?string $first_name = null;

    #[ORM\Column(length: 100)]
    private ?string $last_name = null;

    #[ORM\Column]
    private ?bool $banned = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $banned_duration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_image = null;




    /**
     * @var Collection<int, Gamenight>
     */
    #[ORM\OneToMany(targetEntity: Gamenight::class, mappedBy: 'fk_user_id', orphanRemoval: true)]
    private Collection $gamenight_creator;

    /**
     * @var Collection<int, GamenightSnacks>
     */
    #[ORM\OneToMany(targetEntity: GamenightSnacks::class, mappedBy: 'fk_user_Id')]
    private Collection $gamenightSnacks;

    /**
     * @var Collection<int, Invites>
     */
    #[ORM\OneToMany(targetEntity: Invites::class, mappedBy: 'fk_user_inviter', orphanRemoval: true)]
    private Collection $invites;

    /**
     * @var Collection<int, GamenightParticipant>
     */
    #[ORM\OneToMany(targetEntity: GamenightParticipant::class, mappedBy: 'fk_user_id', orphanRemoval: true)]
    private Collection $gamenightParticipants;



    public function __construct()
    {
        $this->gamenight_creator = new ArrayCollection();
        $this->gamenightSnacks = new ArrayCollection();
        $this->invites = new ArrayCollection();
        $this->gamenightParticipants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function isBanned(): ?bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): static
    {
        $this->banned = $banned;

        return $this;
    }

    public function getBannedDuration(): ?\DateTimeInterface
    {
        return $this->banned_duration;
    }

    public function setBannedDuration(?\DateTimeInterface $banned_duration): static
    {
        $this->banned_duration = $banned_duration;

        return $this;
    }

    public function getUserImage(): ?string
    {
        return $this->user_image;
    }

    public function setUserImage(?string $user_image): static
    {
        $this->user_image = $user_image;

        return $this;
    }




    /**
     * @return Collection<int, Gamenight>
     */
    public function getGamenightCreator(): Collection
    {
        return $this->gamenight_creator;
    }

    public function addGamenightCreator(Gamenight $gamenightCreator): static
    {
        if (!$this->gamenight_creator->contains($gamenightCreator)) {
            $this->gamenight_creator->add($gamenightCreator);
            $gamenightCreator->setFkUserId($this);
        }

        return $this;
    }

    public function removeGamenightCreator(Gamenight $gamenightCreator): static
    {
        if ($this->gamenight_creator->removeElement($gamenightCreator)) {
            // set the owning side to null (unless already changed)
            if ($gamenightCreator->getFkUserId() === $this) {
                $gamenightCreator->setFkUserId(null);
            }
        }

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
            $gamenightSnack->setFkUserId($this);
        }

        return $this;
    }

    public function removeGamenightSnack(GamenightSnacks $gamenightSnack): static
    {
        if ($this->gamenightSnacks->removeElement($gamenightSnack)) {
            // set the owning side to null (unless already changed)
            if ($gamenightSnack->getFkUserId() === $this) {
                $gamenightSnack->setFkUserId(null);
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
            $invite->setFkUserInviter($this);
        }

        return $this;
    }

    public function removeInvite(Invites $invite): static
    {
        if ($this->invites->removeElement($invite)) {
            // set the owning side to null (unless already changed)
            if ($invite->getFkUserInviter() === $this) {
                $invite->setFkUserInviter(null);
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
            $gamenightParticipant->setFkUserId($this);
        }

        return $this;
    }

    public function removeGamenightParticipant(GamenightParticipant $gamenightParticipant): static
    {
        if ($this->gamenightParticipants->removeElement($gamenightParticipant)) {
            // set the owning side to null (unless already changed)
            if ($gamenightParticipant->getFkUserId() === $this) {
                $gamenightParticipant->setFkUserId(null);
            }
        }

        return $this;
    }
}
