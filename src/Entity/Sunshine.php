<?php

namespace App\Entity;

use App\Repository\SunshineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SunshineRepository::class)
 */
class Sunshine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exposure;

    /**
     * @ORM\OneToMany(targetEntity=Plantes::class, mappedBy="sunshine")
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

    public function getExposure(): ?string
    {
        return $this->exposure;
    }

    public function setExposure(string $exposure): self
    {
        $this->exposure = $exposure;

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
            $idPlante->setSunshine($this);
        }

        return $this;
    }

    public function removeIdPlante(Plantes $idPlante): self
    {
        if ($this->id_plante->contains($idPlante)) {
            $this->id_plante->removeElement($idPlante);
            // set the owning side to null (unless already changed)
            if ($idPlante->getSunshine() === $this) {
                $idPlante->setSunshine(null);
            }
        }

        return $this;
    }
}
