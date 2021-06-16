<?php

namespace App\Repository;

use App\Entity\ApunteTipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApunteTipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApunteTipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApunteTipo[]    findAll()
 * @method ApunteTipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApunteTipoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApunteTipo::class);
    }

    // /**
    //  * @return ApunteTipo[] Returns an array of ApunteTipo objects
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
    public function findOneBySomeField($value): ?ApunteTipo
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
