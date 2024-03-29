<?php

namespace App\Entity;

use App\Repository\ParticipationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: ParticipationsRepository::class)]
class Participations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"nom joueur est invalide")]
    #[Assert\Regex(pattern:"/[a-zA-Z]/",message:"Le titre ne peut pas contenir des chiffres")]
    private ?string $nomJoueur = null;
  
    #[ORM\Column]
    #[Assert\NotBlank(message:"nombre participants est invalide")]
    #[Assert\Positive (message:" Le nombre de participants doit etre positive ")]
    #[Assert\Range(
        min: 2,
        max: 50,
        minMessage: 'Le nombre de participants doit au moins 2 participants',
        maxMessage: 'Le nombre de participants ne peut pas dépasser 50 participants ',
    )]
    private ?int $nombreParticipants = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"niveau est invalide")]
    private ?string $niveau = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateParticipations = null;

   


    
    #[Assert\NotBlank(message:"titre est invalide ")]
    #[ORM\ManyToOne(inversedBy: 'participations')]
    #[ORM\JoinColumn(nullable: false)]
    #[MaxDepth(1)]
    private ?Seancecoaching $idseancefk = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?User $users = null;

    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }
   
    public function getNomJoueur(): ?string
    {
        return $this->nomJoueur;
    }

    public function setNomJoueur(string $nomJoueur): self
    {
        $this->nomJoueur = $nomJoueur;

        return $this;
    }

    public function getNombreParticipants(): ?int
    {
        return $this->nombreParticipants;
    }

    public function setNombreParticipants(int $nombreParticipants): self
    {
        $this->nombreParticipants = $nombreParticipants;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getDateParticipations(): ?\DateTimeInterface
    {
        return $this->dateParticipations;
    }

    public function setDateParticipations(\DateTimeInterface $dateParticipations): self
    {
        $this->dateParticipations = $dateParticipations;

        return $this;
    }
    public function getIdseancefk(): ?Seancecoaching
    {
        return $this->idseancefk;
    }

    public function setIdseancefk(?Seancecoaching $idseancefk): self
    {
        $this->idseancefk = $idseancefk;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

   

}
