<?php

namespace App\Repository;

use App\Entity\TvChannel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TvChannel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvChannel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvChannel[]    findAll()
 * @method TvChannel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvChannelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TvChannel::class);
    }

    // /**
    //  * @return TvChannel[] Returns an array of TvChannel objects
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
    public function findOneBySomeField($value): ?TvChannel
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
