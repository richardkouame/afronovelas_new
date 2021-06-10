<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ProgramRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Program
{
    use Timestampable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trailerLink;


    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^\d{2}x\d{2}/")
     */
    private $format;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="programs")
     */
    private $gender;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="programs")
     */
    private $user;

    public function __construct()
    {
        $this->gender = new ArrayCollection();
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

    public function getSynopsis(): ?string
    {
        return strip_tags($this->synopsis);
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getTrailerLink(): ?string
    {
        return $this->trailerLink;
    }

    public function setTrailerLink(?string $trailerLink): self
    {
        $this->trailerLink = $trailerLink;

        return $this;
    }


    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGender(): Collection
    {
        return $this->gender;
    }

    public function addGender(Genre $gender): self
    {
        if (!$this->gender->contains($gender)) {
            $this->gender[] = $gender;
        }

        return $this;
    }

    public function removeGender(Genre $gender): self
    {
        $this->gender->removeElement($gender);

        return $this;
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


    public function getSlug()
    {
       $slug = new Slugify();
       return $slug->slugify($this->getTitle());
    }

    public function getGenderList()
    {
        $list = '';
        foreach ($this->getGender() as $gender) {
            $list .= '<span class="badge badge-success">' . $gender->getTitle() . '</span> ';
        }

        return $list;
    }
}
