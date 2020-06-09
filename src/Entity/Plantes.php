<?php

namespace App\Entity;

use App\Repository\PlantesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Entity\Potting;
use App\Entity\Cutting;
use App\Entity\Carve;
use App\Entity\Flowering;

/**
 * @ORM\Entity(repositoryClass=PlantesRepository::class)
 */
class Plantes
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $species;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=Potting::class, mappedBy="id_plante")
     */
    private $pottings;

    /**
     * @ORM\ManyToMany(targetEntity=Cutting::class, mappedBy="id_plante")
     */
    private $cuttings;

    /**
     * @ORM\ManyToMany(targetEntity=Carve::class, mappedBy="id_plante")
     */
    private $carves;

    /**
     * @ORM\ManyToMany(targetEntity=Flowering::class, mappedBy="id_plante")
     */
    private $flowerings;

    /**
     * @ORM\ManyToOne(targetEntity=Watering::class, inversedBy="id_plante")
     */
    private $watering;

    /**
     * @ORM\ManyToOne(targetEntity=Sunshine::class, inversedBy="id_plante")
     */
    private $sunshine;

    /**
     * @ORM\ManyToOne(targetEntity=Difficulty::class, inversedBy="id_plante")
     */
    private $difficulty;

    public function __construct()
    {
        $this->pottings = new ArrayCollection();
        $this->cuttings = new ArrayCollection();
        $this->carves = new ArrayCollection();
        $this->flowerings = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|Potting[]
     */
    public function getPottings()
    {
        return $this->pottings;
    }

    public function addPotting(Potting $potting): self
    {
        if (!$this->pottings->contains($potting)) {
            $this->pottings[] = $potting;
            $potting->addIdPlante($this);
        }

        return $this;
    }

    public function removePotting(Potting $potting): self
    {
        if ($this->pottings->contains($potting)) {
            $this->pottings->removeElement($potting);
            $potting->removeIdPlante($this);
        }

        return $this;
    }

    /**
     * @return Collection|Cutting[]
     */
    public function getCuttings()
    {
        return $this->cuttings;
    }

    public function addCutting(Cutting $cutting): self
    {
        if (!$this->cuttings->contains($cutting)) {
            $this->cuttings[] = $cutting;
            $cutting->addIdPlante($this);
        }

        // return $this;
    }

    public function removeCutting(Cutting $cutting): self
    {
        if ($this->cuttings->contains($cutting)) {
            $this->cuttings->removeElement($cutting);
            $cutting->removeIdPlante($this);
        }

        return $this;
    }

    /**
     * @return Collection|Carve[]
     */
    public function getCarves()
    {
        return $this->carves;
    }

    public function addCarf(Carve $carf): self
    {
        if (!$this->carves->contains($carf)) {
            $this->carves[] = $carf;
            $carf->addIdPlante($this);
        }

        return $this;
    }

    public function removeCarf(Carve $carf): self
    {
        if ($this->carves->contains($carf)) {
            $this->carves->removeElement($carf);
            $carf->removeIdPlante($this);
        }

        return $this;
    }

    /**
     * @return Collection|Flowering[]
     */
    public function getFlowerings()
    {
        return $this->flowerings;
    }

    public function addFlowering(Flowering $flowering): self
    {
        if (!$this->flowerings->contains($flowering)) {
            $this->flowerings[] = $flowering;
            $flowering->addIdPlante($this);
        }

        return $this;
    }

    public function removeFlowering(Flowering $flowering): self
    {
        if ($this->flowerings->contains($flowering)) {
            $this->flowerings->removeElement($flowering);
            $flowering->removeIdPlante($this);
        }

        return $this;
    }

    public function __contruct(){
        $this->setCreatedAt(new DateTime());
    }

    public function getWatering(): ?Watering
    {
        return $this->watering;
    }

    public function setWatering(?Watering $watering): self
    {
        $this->watering = $watering;

        return $this;
    }

    public function getSunshine(): ?Sunshine
    {
        return $this->sunshine;
    }

    public function setSunshine(?Sunshine $sunshine): self
    {
        $this->sunshine = $sunshine;

        return $this;
    }

    public function getDifficulty(): ?Difficulty
    {
        return $this->difficulty;
    }

    public function setDifficulty(?Difficulty $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}
