<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StagiaireRepository::class)
 */
class Stagiaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity=Adresse::class, inversedBy="stagiaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @ORM\ManyToMany(targetEntity=Sondage::class, inversedBy="stagiaires")
     */
    private $sondages;

    public function __construct()
    {
        $this->sondages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRelation(): ?Adresse
    {
        return $this->relation;
    }

    public function setRelation(?Adresse $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection|Sondage[]
     */
    public function getSondages(): Collection
    {
        return $this->sondages;
    }

    public function addSondage(Sondage $sondage): self
    {
        if (!$this->sondages->contains($sondage)) {
            $this->sondages[] = $sondage;
        }

        return $this;
    }

    public function removeSondage(Sondage $sondage): self
    {
        $this->sondages->removeElement($sondage);

        return $this;
    }
}
