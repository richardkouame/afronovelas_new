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
     * @ORM\Column(type="datetime")
     */
    private $Passage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="schedules")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Program::class, inversedBy="schedules")
     */
    private $program;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassage(): ?\DateTimeInterface
    {
        return $this->Passage;
    }

    public function setPassage(\DateTimeInterface $Passage): self
    {
        $this->Passage = $Passage;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
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

    public function getProgram(): ?Program
    {
        return $this->program;
    }

    public function setProgram(?Program $program): self
    {
        $this->program = $program;

        return $this;
    }
}
