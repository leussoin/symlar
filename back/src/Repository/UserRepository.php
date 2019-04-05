<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function transform(User $user)
    {
        return [
            // 'id'    => (int) $user->getId(),
            'usertype' => (string) $user->getUserType()->getName(),
            'lastname' => (string) $user->getLastName(),
            'firstname' => (string) $user->getFirstName(),
            'gender' => (string) $user->getGender(),
            'poste' => (string) $user->getPoste()->getName(),
            // 'birthdate' => (string) $user->getBirthDate(),
            // 'username' => (string) $user->getUsername(),
            // 'email' => (string) $user->getEmail(),
            // 'enabled' => (bool) $user->isEnabled(),
            // 'lastlogin' => (string) $user->getLastLogin(),
            // 'roles' => (array) $user->getRoles(),
        ];
    }

    public function transformAll()
    {
        $users = $this->findAll();
        $usersArray = [];

        foreach ($users as $user) {
            $usersArray[] = $this->transform($user);
        }

        return $usersArray;
    }
}
