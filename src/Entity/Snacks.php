<?php

namespace App\Entity;

use App\Repository\SnacksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SnacksRepository::class)]
class Snacks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, GamenightSnacks>
     */
    #[ORM\OneToMany(targetEntity: GamenightSnacks::class, mappedBy: 'fk_snack_id', orphanRemoval: true)]
    private Collection $gamenightSnacks;

    public function __construct()
    {
        $this->gamenightSnacks = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
            $gamenightSnack->setFkSnackId($this);
        }

        return $this;
    }

    public function removeGamenightSnack(GamenightSnacks $gamenightSnack): static
    {
        if ($this->gamenightSnacks->removeElement($gamenightSnack)) {
            // set the owning side to null (unless already changed)
            if ($gamenightSnack->getFkSnackId() === $this) {
                $gamenightSnack->setFkSnackId(null);
            }
        }

        return $this;
    }
}
