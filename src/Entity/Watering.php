<?php

namespace App\Entity;

use App\Repository\WateringRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @Groups({"all_plantes", "dashboard"})  
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"all_plantes", "dashboard"})  
     */
    private $frequency;

    /**
     * @ORM\OneToMany(targetEntity=Plantes::class, mappedBy="watering")
     */
    private $id_plante;

    /**
     * @Groups({"all_plantes", "dashboard"})  
     */
    private $timeFrequency;

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

    public function getTimeFrequency(){
        // return watering frequency with timestamp (3d, 1 week and 3 weeks)

        switch ($this->getId()){

            case 1 : 
            return 259200;
            break;

            case 2 :
            return 604800;
            break;

            case 3 :
            return 1814400;
            break;
        }
    }
}
