<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ExamRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ExamRepository::class)]
#[ApiResource]
class Exam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de l'étudiant est obligatoire.")]
    #[Assert\Length(max: 255, maxMessage: "Le nom ne doit pas dépasser {{ limit }} caractères.")]
    private ?string $studentName = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "Le lieu ne doit pas dépasser {{ limit }} caractères.")]
    private ?string $location = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "La date de l'examen est obligatoire.")]
    #[Assert\Type(type: '\DateTimeInterface', message: "La date doit être valide.")]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: "L'heure de l'examen est obligatoire.")]
    #[Assert\Type(type: '\DateTimeInterface', message: "L'heure doit être valide.")]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le statut de l'examen est obligatoire.")]
    #[Assert\Choice(
        choices: ["Confirmé", "À organiser", "Annulé", "En recherche de place"],
        message: "Le statut doit être l'une des valeurs suivantes : Confirmé, À organiser, Annulé, En recherche de place."
    )]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentName(): ?string
    {
        return $this->studentName;
    }

    public function setStudentName(string $studentName): static
    {
        $this->studentName = $studentName;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
