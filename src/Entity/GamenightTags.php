<?php

namespace App\Entity;

use App\Repository\GamenightTagsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamenightTagsRepository::class)]
class GamenightTags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightTags')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gamenight $fk_gamenight_id = null;

    #[ORM\ManyToOne(inversedBy: 'gamenightTags')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tags $fk_tag_id = null;

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

    public function getFkTagId(): ?Tags
    {
        return $this->fk_tag_id;
    }

    public function setFkTagId(?Tags $fk_tag_id): static
    {
        $this->fk_tag_id = $fk_tag_id;

        return $this;
    }
}
