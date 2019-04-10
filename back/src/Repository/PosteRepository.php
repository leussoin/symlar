<?php

namespace App\Repository;

use App\Entity\Poste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Poste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poste[]    findAll()
 * @method Poste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PosteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Poste::class);
    }

    public function transform(Poste $poste)
    {
        return [
            'name' => (string) $poste->getName(),
            'hierarchy' => (int) $poste->getHierarchy(),
        ];
    }

    public function transformAll()
    {
        $poste = $this->findAll();
        $posteArray = [];

        foreach ($poste as $pst) {
            $posteArray[] = $this->transform($pst);
        }

        return $posteArray;
    }
}
