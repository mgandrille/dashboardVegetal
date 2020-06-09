<?php

namespace App\Repository;

use App\Entity\Carve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carve[]    findAll()
 * @method Carve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carve::class);
    }

    // /**
    //  * @return Carve[] Returns an array of Carve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Carve
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
