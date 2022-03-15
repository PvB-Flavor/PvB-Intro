<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Coach", inversedBy="clients")
     */
    private $coach;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type("string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type("string")
     */
    private $surname;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Type("date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type("string")
     */
    private $language;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type("string")
     */
    private $color;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type("string")
     */
    private $imgPath;

    /**
     * @ORM\Column(type="simple_array", nullable=false)
     */
    private $panicButtons;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCoach()
    {
        return $this->coach;
    }

    /**
     * @param mixed $coach
     */
    public function setCoach($coach): void
    {
        $this->coach = $coach;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language): void
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getPanicButtons()
    {
        return $this->panicButtons;
    }

    /**
     * @param mixed $panicButtons
     */
    public function setPanicButtons($panicButtons): void
    {
        $this->panicButtons = $panicButtons;
    }

    /**
     * @return mixed
     */
    public function getImgPath()
    {
        return $this->imgPath;
    }

    /**
     * @param mixed $imgPath
     */
    public function setImgPath($imgPath): void
    {
        $this->imgPath = $imgPath;
    }
}
