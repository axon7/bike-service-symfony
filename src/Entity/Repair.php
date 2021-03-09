<?php

namespace App\Entity;

use App\Repository\RepairRepository;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepairRepository::class)
 */
class Repair
{
    use TimestampableEntity;

    public function __toString()
    {
        return $this->name;
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bike_model;

    /**
     * @ORM\Column(type="boolean")
     */
    private $completed;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="repairs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


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

    public function getBikeModel(): ?string
    {
        return $this->bike_model;
    }

    public function setBikeModel(string $bike_model): self
    {
        $this->bike_model = $bike_model;

        return $this;
    }

    public function getCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): self
    {
        $this->completed = $completed;

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

    
}
