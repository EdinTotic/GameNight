<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    /**
     * @var Collection<int, Gamenight>
     */
    #[ORM\OneToMany(targetEntity: Gamenight::class, mappedBy: 'fk_game_id', orphanRemoval: true)]
    private Collection $gamenight_game;

    public function __construct()
    {
        $this->gamenight_game = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Gamenight>
     */
    public function getGamenightGame(): Collection
    {
        return $this->gamenight_game;
    }

    public function addGamenightGame(Gamenight $gamenightGame): static
    {
        if (!$this->gamenight_game->contains($gamenightGame)) {
            $this->gamenight_game->add($gamenightGame);
            $gamenightGame->setFkGameId($this);
        }

        return $this;
    }

    public function removeGamenightGame(Gamenight $gamenightGame): static
    {
        if ($this->gamenight_game->removeElement($gamenightGame)) {
            // set the owning side to null (unless already changed)
            if ($gamenightGame->getFkGameId() === $this) {
                $gamenightGame->setFkGameId(null);
            }
        }

        return $this;
    }
}
