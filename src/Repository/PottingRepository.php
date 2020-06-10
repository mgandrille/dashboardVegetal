<?php

namespace App\Repository;

use App\Entity\Potting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Potting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Potting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Potting[]    findAll()
 * @method Potting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PottingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Potting::class);
    }

    // /**
    //  * @return Potting[] Returns an array of Potting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Potting
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
