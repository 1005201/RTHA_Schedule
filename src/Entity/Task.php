<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: schedule::class)]
    private Collection $schedule;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $roles = null;

    #[ORM\OneToMany(mappedBy: 'task', targetEntity: category::class)]
    private Collection $category;

    public function __construct()
    {
        $this->schedule = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, schedule>
     */
    public function getSchedule(): Collection
    {
        return $this->schedule;
    }

    public function addSchedule(schedule $schedule): static
    {
        if (!$this->schedule->contains($schedule)) {
            $this->schedule->add($schedule);
        }

        return $this;
    }

    public function removeSchedule(schedule $schedule): static
    {
        $this->schedule->removeElement($schedule);

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection<int, category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setTask($this);
        }

        return $this;
    }

    public function removeCategory(category $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getTask() === $this) {
                $category->setTask(null);
            }
        }

        return $this;
    }
}
