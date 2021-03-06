<?php

namespace App\Entity;

use App\Repository\CarveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CarveRepository::class)
 */
class Carve
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"all_plantes", "dashboard", "user"})  
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"all_plantes", "dashboard", "user"})  
     */
    private $month;

    /**
     * @ORM\ManyToMany(targetEntity=Plantes::class, inversedBy="carves")
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

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(string $month): self
    {
        $this->month = $month;

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
        }

        return $this;
    }

    public function removeIdPlante(Plantes $idPlante): self
    {
        if ($this->id_plante->contains($idPlante)) {
            $this->id_plante->removeElement($idPlante);
        }

        return $this;
    }
}
