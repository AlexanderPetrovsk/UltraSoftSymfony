<?php

namespace App\Entity;

use App\Repository\ExampleEntityRepository;

#[ORM\Entity(repositoryClass: ExampleEntityRepository::class)]
class ExampleEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    public function setLastName(): string
    {
        return $this->lastName;
    }

    public function getLastName(?string $lastName = null): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setEmail(): string
    {
        return $this->email;
    }

    public function getEmail(?string $email = null): self
    {
        $this->email = $email;

        return $this;
    }
}