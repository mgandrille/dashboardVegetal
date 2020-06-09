<?php

namespace App\Entity;

use App\Repository\WateringRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WateringRepository::class)
 */
class Watering
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
    private $frequency;

    /**
     * @ORM\OneToMany(targetEntity=Plantes::class, mappedBy="watering")
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

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): self
    {
        $this->frequency = $frequency;

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
            $idPlante->setWatering($this);
        }

        return $this;
    }

    public function removeIdPlante(Plantes $idPlante): self
    {
        if ($this->id_plante->contains($idPlante)) {
            $this->id_plante->removeElement($idPlante);
            // set the owning side to null (unless already changed)
            if ($idPlante->getWatering() === $this) {
                $idPlante->setWatering(null);
            }
        }

        return $this;
    }
}
