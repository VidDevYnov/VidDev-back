<?php

namespace App\Repository;

use App\Entity\ArticleSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleSize[]    findAll()
 * @method ArticleSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleSize::class);
    }

    // /**
    //  * @return ArticleSize[] Returns an array of ArticleSize objects
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
    public function findOneBySomeField($value): ?ArticleSize
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
