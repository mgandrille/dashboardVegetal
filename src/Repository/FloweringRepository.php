<?php

namespace App\Repository;

use App\Entity\Flowering;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Flowering|null find($id, $lockMode = null, $lockVersion = null)
 * @method Flowering|null findOneBy(array $criteria, array $orderBy = null)
 * @method Flowering[]    findAll()
 * @method Flowering[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FloweringRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Flowering::class);
    }

    // /**
    //  * @return Flowering[] Returns an array of Flowering objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Flowering
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
