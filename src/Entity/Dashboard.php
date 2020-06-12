<?php

namespace App\Entity;

use App\Repository\DashboardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DashboardRepository::class)
 */
class Dashboard
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("dashboard")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="dashboard", cascade={"persist", "remove"})
     * @Groups("dashboard")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Plantes::class, inversedBy="dashboards")
     * @Groups("dashboard")
     */
    private $plantes;

    public function __construct()
    {
        $this->plantes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Plantes[]
     */
    public function getPlantes(): Collection
    {
        return $this->plantes;
    }

    public function addPlante(Plantes $plante): self
    {
        if (!$this->plantes->contains($plante)) {
            $this->plantes[] = $plante;
        }

        return $this;
    }

    public function removePlante(Plantes $plante): self
    {
        if ($this->plantes->contains($plante)) {
            $this->plantes->removeElement($plante);
        }

        return $this;
    }
}
