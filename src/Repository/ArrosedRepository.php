<?php

namespace App\Repository;

use App\Entity\Arrosed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Arrosed|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arrosed|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arrosed[]    findAll()
 * @method Arrosed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArrosedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arrosed::class);
    }

    // /**
    //  * @return Arrosed[] Returns an array of Arrosed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findTheGood($dashId, $planteId)
    {
        return $this->createQueryBuilder('a')
            ->where('a.plante = :planteId')
            ->setParameter('planteId', $planteId)
            ->andWhere('a.dashboard = :dashId')
            ->setParameter('dashId', $dashId)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Arrosed
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
