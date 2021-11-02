<?php

namespace App\Entity;

use App\Repository\ProgramRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var File
     * @Vich\UploadableField(mapping="photo_program_file", fileNameProperty="photo")
     * @Assert\Image(
     *      maxSize = "500k",
     *      maxSizeMessage = "coucou",
     *      mimeTypes = {"image/png", "image/jpg", "image/jpeg", "image/gif"},
     *      mimeTypesMessage = "Le format {{ type }} n'est pas autorisé, formats autorisés: {{ types }}",
     *      minRatio = "1",
     *      minRatioMessage = "Un ratio de {{ ratio }} n'est pas optimal, il doit être de {{ min_ratio }} minimum",
     *      maxRatio = "2",
     *      maxRatioMessage = "Un ratio de {{ ratio }} n'est pas optimal, il doit être de {{ max_ratio }} maximum",
     * )
     */
    private $photoFile;

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
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
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

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

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

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function setPhotoFile(File $image = null): void
    {
        $this->photoFile = $image;
        if($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
