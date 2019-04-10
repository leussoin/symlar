<?php

namespace App\Repository;

use App\Entity\TechDomain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Techno|null find($id, $lockMode = null, $lockVersion = null)
 * @method Techno|null findOneBy(array $criteria, array $orderBy = null)
 * @method Techno[]    findAll()
 * @method Techno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechDomainRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TechDomain::class);
    }

    public function transform(TechDomain $techDomain)
    {
        return [
            'name' => (string) $techDomain->getName(),
        ];
    }

    public function transformAll()
    {
        $techDomain = $this->findAll();
        $techDomainArray = [];

        foreach ($techDomain as $tchDom) {
            $techDomainArray[] = $this->transform($tchDom);
        }

        return $techDomainArray;
    }
}
