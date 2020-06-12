<?php

namespace App\Entity;

use App\Repository\DifficultyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DifficultyRepository::class)
 */
class Difficulty
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"all_plantes", "dashboard"})  
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"all_plantes", "dashboard"})  
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=Plantes::class, mappedBy="difficulty")
     */
    private $id_plante;

    public function __construct()
    {
        $this->id_plante = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Plantes[]
     */
    public function getIdPlante(): Collection
    {
        return $this->id_plante;
    }

    public function addIdPlante(Plantes $idPlante): self
    {
        if (!$this->id_plante->contains($idPlante)) {
            $this->id_plante[] = $idPlante;
            $idPlante->setDifficulty($this);
        }

        return $this;
    }

    public function removeIdPlante(Plantes $idPlante): self
    {
        if ($this->id_plante->contains($idPlante)) {
            $this->id_plante->removeElement($idPlante);
            // set the owning side to null (unless already changed)
            if ($idPlante->getDifficulty() === $this) {
                $idPlante->setDifficulty(null);
            }
        }

        return $this;
    }
}
