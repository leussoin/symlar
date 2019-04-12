<?php

namespace App\Repository;

use App\Entity\UserType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserType|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserType|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserType[]    findAll()
 * @method UserType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserType::class);
    }

    public static function orderByName($entityRepository)
    {
        return $entityRepository->createQueryBuilder('t')
            ->orderBy('t.name', 'ASC')
        ;
    }
}
