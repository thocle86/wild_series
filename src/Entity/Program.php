<?php

namespace App\Entity;

use App\Repository\ProgramRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 */
class Program
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le nom ne peut pas faire plus de {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "Le synopsis doit faire au moins {{ limit }} caractères"
     * )
     */
    private $synopsis;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le nom ne peut pas faire plus de {{ limit }} caractères"
     * )
     */
    private $photo;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Le nom ne peut pas faire plus de {{ limit }} caractères",
     * )
     */
    private $country;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @Assert\Type(
     *     type="integer",
     *     message="L'année doit être un nombre"
     * )
     * @Assert\Length(
     *      min = 4,
     *      max = 4.1,
     *      minMessage = "L'année doit être composée de 4 chiffres",
     *      maxMessage = "L'année doit être composée de 4 chiffres",
     * )
     * @Assert\Positive(message="L'année doit être positive")
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="programs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

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
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
