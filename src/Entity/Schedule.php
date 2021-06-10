<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Schedule
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


    private $passageTab;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="schedules")
     */
    private $user;

    /**
     * @ORM\Column(type="array")
     */
    private $passage = [];


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

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


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPassage(): ?array
    {
        return $this->passage;
    }

    public function setPassage(array $passage): self
    {
        $this->passage = $passage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassageTab()
    {
        return $this->passageTab;
    }

    /**
     * @param mixed $passageTab
     */
    public function setPassageTab($passageTab): void
    {
        $this->passageTab = $passageTab;
    }
}
