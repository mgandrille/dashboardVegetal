<?php

namespace App\Repository;

use App\Entity\Sunshine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sunshine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sunshine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sunshine[]    findAll()
 * @method Sunshine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SunshineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sunshine::class);
    }

    // /**
    //  * @return Sunshine[] Returns an array of Sunshine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sunshine
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
