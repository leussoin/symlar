<?php

namespace App\Repository;

use App\Entity\Techno;
use App\Entity\TechDomain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Techno|null find($id, $lockMode = null, $lockVersion = null)
 * @method Techno|null findOneBy(array $criteria, array $orderBy = null)
 * @method Techno[]    findAll()
 * @method Techno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Techno::class);
    }

    public function transform(Techno $techno)
    {
        return [
            'name' => (string) $techno->getName(),
            'domain' => (string) $techno->getDomain()->getName(),
        ];
    }

    public function transformAll()
    {
        $techno = $this->findAll();
        $technoArray = [];

        foreach ($techno as $tech) {
            $technoArray[] = $this->transform($tech);
        }

        return $technoArray;
    }
}
