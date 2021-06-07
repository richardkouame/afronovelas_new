<?php

namespace App\Repository;

use App\Entity\FooterBanner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FooterBanner|null find($id, $lockMode = null, $lockVersion = null)
 * @method FooterBanner|null findOneBy(array $criteria, array $orderBy = null)
 * @method FooterBanner[]    findAll()
 * @method FooterBanner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FooterBannerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FooterBanner::class);
    }

    // /**
    //  * @return FooterBanner[] Returns an array of FooterBanner objects
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
    public function findOneBySomeField($value): ?FooterBanner
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
