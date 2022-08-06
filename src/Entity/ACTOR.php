<?php

namespace App\Entity;

use App\Repository\ACTORRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ACTORRepository::class)]
class ACTOR
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: MOVIE::class, mappedBy: 'actors')]
    private $mOVIEs;

    public function __construct()
    {
        $this->mOVIEs = new ArrayCollection();
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

    /**
     * @return Collection<int, MOVIE>
     */
    public function getMOVIEs(): Collection
    {
        return $this->mOVIEs;
    }

    public function addMOVIE(MOVIE $mOVIE): self
    {
        if (!$this->mOVIEs->contains($mOVIE)) {
            $this->mOVIEs[] = $mOVIE;
            $mOVIE->addActor($this);
        }

        return $this;
    }

    public function removeMOVIE(MOVIE $mOVIE): self
    {
        if ($this->mOVIEs->removeElement($mOVIE)) {
            $mOVIE->removeActor($this);
        }

        return $this;
    }
}
