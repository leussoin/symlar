<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Adress", inversedBy="user")
     */
    private $adress;
    

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Poste")
     */
    private $poste;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserType(): UserType
    {
        return $this->userType;
    }

    public function setUserType(UserType $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    public function getAdress(): ?int
    {
        return $this->adress;
    }

    public function setAdress(int $adress): self
    {
        $this->adress .= $adress.'|';

        return $this;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender(string $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPoste()
    {
        return $this->poste;
    }

    public function setPoste(string $poste)
    {
        $this->poste = $poste;

        return $this;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
