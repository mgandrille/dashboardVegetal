<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("all_plantes")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Plantes::class, mappedBy="category")
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

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function setCategories(?string $categories): self
    {
        $this->categories = $categories;

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
            $planteId->setCategory($this);
        }

        return $this;
    }

    public function removePlanteId(Plantes $planteId): self
    {
        if ($this->plante_id->contains($planteId)) {
            $this->plante_id->removeElement($planteId);
            // set the owning side to null (unless already changed)
            if ($planteId->getCategory() === $this) {
                $planteId->setCategory(null);
            }
        }

        return $this;
    }
}
