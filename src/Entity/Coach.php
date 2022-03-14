<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CoachRepository::class)
 */
class Coach
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Client", mappedBy="coach")
     */
    private $clients;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type("string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Type("string")
     */
    private $imgPath;

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return mixed
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param mixed $clients
     */
    public function setClients($clients): void
    {
        $this->clients = $clients;
    }
}
