<?php

namespace App\Entity;

use App\Entity\Poste ;
use App\Entity\Adresse ;
use App\Entity\Techno ;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\JoinColumn(nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\JoinColumn(nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\JoinColumn(nullable=true)
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Poste")
     */
    private $poste;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Adress", mappedBy="user", cascade={"persist"})
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\JoinColumn(nullable=true)
     */
    private $newAdress;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Techno", inversedBy="users", cascade={"persist"})
     */
    private $technos;

    public function __construct(){
        $this->adress = new ArrayCollection();
        
        $this->technos = new ArrayCollection();
    }

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

    public function getUserType(): ?UserType
    {
        return $this->userType;
    }

    public function setUserType(UserType $userType): self
    {
        $this->userType = $userType;

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

    public function setPoste(Poste $poste)
    {
        $this->poste = $poste;

        return $this;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return Collection|Adress[]
     */
    public function getAdress(): Collection
    {
        return $this->adress;
    }

    public function addAdress(Adress $adress): self
    {
        if (!$this->adress->contains($adress)) {
            $this->adress[] = $adress;
            $adress->addUser($this);
        }

        return $this;
    }

    public function removeAdress(Adress $adress): self
    {
        if ($this->adress->contains($adress)) {
            $this->adress->removeElement($adress);
            $adress->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Techno[]
     */
    public function getTechnos(): Collection
    {
        return $this->technos;
    }

    public function addTechno(Techno $techno): self
    {
        if (!$this->technos->contains($techno)) {
            $this->technos[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Techno $techno): self
    {
        if ($this->technos->contains($techno)) {
            $this->technos->removeElement($techno);
        }

        return $this;
    }

    public function setNewAdress(Adress $adress): self
    {
        $this->newAdress = $adress;

        return $this;
    }

    public function getNewAdress(): ?self
    {
        return $this->newAdress;
    }
}
