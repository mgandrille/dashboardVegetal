<?php

namespace App\Repository;

use App\Entity\Plantes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Plantes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plantes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plantes[]    findAll()
 * @method Plantes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlantesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plantes::class);
    }

    // /**
    //  * @return Plantes[] Returns an array of Plantes objects
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

    // public function searchSystem(   ?string $name, 
    //                                 ?int $sunshine, 
    //                                 ?int $difficulty, 
    //                                 ?int $type, 
    //                                 ?int $watering){

    //     return $this->createQueryBuilder('p')
    //         ->where('p.name LIKE :name OR p.species LIKE :name')
    //         ->andWhere('p.watering = :watering')
    //         ->andWhere('p.type = :type')
    //         ->andWhere('p.difficulty = :difficulty')
    //         ->andWhere('p.sunshine = :sunshine')
    //         ->setParameter('name', '%'.$name.'%')
    //         ->setParameter('watering', $watering)
    //         ->setParameter('type', $type)
    //         ->setParameter('difficulty', $difficulty)
    //         ->setParameter('sunshine', $sunshine)
    //         ->getQuery()
    //         ->getResult();
    // }

    /*
    public function findOneBySomeField($value): ?Plantes
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
