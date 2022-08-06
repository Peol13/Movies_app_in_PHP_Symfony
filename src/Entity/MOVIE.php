<?php

namespace App\Entity;

use App\Repository\MOVIERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: MOVIERepository::class)]
class MOVIE
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
     
    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    
     
    private $title;

    #[ORM\Column(type: 'integer')]
      
    #[Assert\NotBlank]
    
    private $releasedYear;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
     
    #[Assert\NotBlank]
     
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
     
  
 
     
    private $imagePath;

    #[ORM\ManyToMany(targetEntity: ACTOR::class, inversedBy: 'mOVIEs')]
    private $actors;

    public function __construct()
    {
        $this->actors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getReleasedYear(): ?int
    {
        return $this->releasedYear;
    }

    public function setReleasedYear(int $releasedYear): self
    {
        $this->releasedYear = $releasedYear;

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

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): self
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /* 
     * @return Collection<int, ACTOR>
     */
    public function getActors(): Collection
    {
        return $this->actors;
    }

    public function addActor(ACTOR $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors[] = $actor;
        }

        return $this;
    }

    public function removeActor(ACTOR $actor): self
    {
        $this->actors->removeElement($actor);

        return $this;
    }
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }


}
