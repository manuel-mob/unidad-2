<?php

namespace App\Repository;

use App\Entity\Apunte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apunte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apunte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apunte[]    findAll()
 * @method Apunte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApunteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apunte::class);
    }

    // /**
    //  * @return Apunte[] Returns an array of Apunte objects
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

    /*
    public function findOneBySomeField($value): ?Apunte
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
