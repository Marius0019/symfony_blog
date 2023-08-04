<?php

namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\EmployesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[Assert\NotBlank(message: 'Ce champs ne peut pas être vide')]
    #[Assert\Length(
        min:5,
        max:50,
        minMessage : "Pas assez de caractères. il faut au moins {{ limit }} caractères",
        maxMessage :  "Trop de de caractères. il faut au maximum {{ limit }} caractères"
    )]
    #[ORM\Column(length: 255)]
    private ?string $prenom = null;


    #[Assert\NotBlank(message: 'Ce champs ne peut pas être vide')]
    #[Assert\Length(
        min:5,
        max:50,
        minMessage : "Pas assez de caractères. il faut au moins {{ limit }} caractères",
        maxMessage :  "Trop de de caractères. il faut au maximum {{ limit }} caractères"
    )]
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[Assert\NotBlank(message: 'Ce champs ne peut pas être vide')]
    #[Assert\Length(
        min:5,
        max:10,
        minMessage : "Pas assez de caractères. il faut au moins {{ limit }} caractères",
        maxMessage :  "Trop de de caractères. il faut au maximum {{ limit }} caractères"
    )]
    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[Assert\NotBlank(message: 'Ce champs ne peut pas être vide')]
    #[Assert\Length(
        min:5,
        max:10,
        minMessage : "Pas assez de caractères. il faut au moins {{ limit }} caractères",
        maxMessage :  "Trop de de caractères. il faut au maximum {{ limit }} caractères"
    )]
    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\Column]
    private ?int $salaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_naissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): static
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

}
