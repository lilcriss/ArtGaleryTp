<?php

namespace App\Repository;

use App\Entity\Encheres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Encheres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Encheres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Encheres[]    findAll()
 * @method Encheres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EncheresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Encheres::class);
    }

    // /**
    //  * @return Encheres[] Returns an array of Encheres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Encheres
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
