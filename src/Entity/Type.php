<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"all_plantes", "dashboard", "user"})  
     */
    private $plante_type;

    /**
     * @ORM\OneToMany(targetEntity=Plantes::class, mappedBy="type")
     */
    private $plante_id;

    public function __construct()
    {
        $this->plante_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanteType(): ?string
    {
        return $this->plante_type;
    }

    public function setPlanteType(?string $plante_type): self
    {
        $this->plante_type = $plante_type;

        return $this;
    }

    /**
     * @return Collection|Plantes[]
     */
    public function getPlanteId(): Collection
    {
        return $this->plante_id;
    }

    public function addPlanteId(Plantes $planteId): self
    {
        if (!$this->plante_id->contains($planteId)) {
            $this->plante_id[] = $planteId;
            $planteId->setType($this);
        }

        return $this;
    }

    public function removePlanteId(Plantes $planteId): self
    {
        if ($this->plante_id->contains($planteId)) {
            $this->plante_id->removeElement($planteId);
            // set the owning side to null (unless already changed)
            if ($planteId->getType() === $this) {
                $planteId->setType(null);
            }
        }

        return $this;
    }
}
