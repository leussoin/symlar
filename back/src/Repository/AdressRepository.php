<?php

namespace App\Repository;

use App\Entity\Adress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Adress|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adress|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adress[]    findAll()
 * @method Adress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdressRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Adress::class);
    }

    public function transform(Adress $adress)
    {
        return [
            'cp' => (int) $adress->getCp(),
            'city' => (string) $adress->getCity(),
            'adress' => (string) $adress->getAdress(),
            'primary' => (bool) $adress->getIsPrimary(),
        ];
    }

    public function transformAll()
    {
        $adress = $this->findAll();
        $adressArray = [];

        foreach ($adress as $adr) {
            $adressArray[] = $this->transform($adr);
        }

        return $adressArray;
    }

    public static function filterByUserId($entityRepository, $id) 
    {
        $result = $entityRepository->createQueryBuilder('a')
            ->orderBy('a.city', 'ASC')
        ;

        $result->where('a = :id')
            ->setParameter(':id', $id);
        // dd($result);

        return $result;
    }
}
