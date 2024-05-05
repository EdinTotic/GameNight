<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, GamenightTags>
     */
    #[ORM\OneToMany(targetEntity: GamenightTags::class, mappedBy: 'fk_tag_id', orphanRemoval: true)]
    private Collection $gamenightTags;





    public function __construct()
    {
        $this->gamenightTags = new ArrayCollection();
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
            $gamenightTag->setFkTagId($this);
        }

        return $this;
    }

    public function removeGamenightTag(GamenightTags $gamenightTag): static
    {
        if ($this->gamenightTags->removeElement($gamenightTag)) {
            // set the owning side to null (unless already changed)
            if ($gamenightTag->getFkTagId() === $this) {
                $gamenightTag->setFkTagId(null);
            }
        }

        return $this;
    }
}
