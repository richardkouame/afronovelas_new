<?php

namespace App\Repository;

use App\Entity\TvChanel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TvChanel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvChanel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvChanel[]    findAll()
 * @method TvChanel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvChanelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TvChanel::class);
    }

    // /**
    //  * @return TvChanel[] Returns an array of TvChanel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TvChanel
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
