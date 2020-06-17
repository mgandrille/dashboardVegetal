<?php

namespace App\Entity;

use App\Repository\ArrosedRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ArrosedRepository::class)
 */
class Arrosed
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $arrosed_at;

    /**
     * @ORM\ManyToOne(targetEntity=Plantes::class, inversedBy="arroseds")
     */
    private $plante;

    /**
     * @ORM\ManyToOne(targetEntity=Dashboard::class, inversedBy="arroseds")
     */
    private $dashboard;

    /**
     * @Groups({"dashboard", "user", "all_plantes"})
     */
    private $convertTimestamp;

    public function __construct(Plantes $plante, Dashboard $dashboard){
        $this->arrosed_at = new \DateTime();
        $this->setPlante($plante);
        $this->setDashboard($dashboard);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrosedAt(): ?\DateTimeInterface
    {
        return $this->arrosed_at;
    }

    public function setArrosedAt(?\DateTimeInterface $arrosed_at): self
    {
        $this->arrosed_at = $arrosed_at;

        return $this;
    }

    public function getPlante(): ?Plantes
    {
        return $this->plante;
    }

    public function setPlante(?Plantes $plante): self
    {
        $this->plante = $plante;

        return $this;
    }

    public function getDashboard(): ?Dashboard
    {
        return $this->dashboard;
    }

    public function setDashboard(?Dashboard $dashboard): self
    {
        $this->dashboard = $dashboard;

        return $this;
    }

    public function getConvertTimestamp(){
        // Convert Datetime to Timestamp
        return $this->getArrosedAt()->getTimestamp();
    }
}
