<?php

namespace App\Repository;

use App\Entity\Foodtruck;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Foodtruck|null find($id, $lockMode = null, $lockVersion = null)
 * @method Foodtruck|null findOneBy(array $criteria, array $orderBy = null)
 * @method Foodtruck[]    findAll()
 * @method Foodtruck[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodtruckRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Foodtruck::class);
    }

    // /**
    //  * @return Foodtruck[] Returns an array of Foodtruck objects
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
    public function findOneBySomeField($value): ?Foodtruck
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
