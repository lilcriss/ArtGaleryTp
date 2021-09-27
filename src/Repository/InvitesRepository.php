<?php

namespace App\Repository;

use App\Entity\Invites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Invites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Invites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Invites[]    findAll()
 * @method Invites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invites::class);
    }

    // /**
    //  * @return Invites[] Returns an array of Invites objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Invites
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
