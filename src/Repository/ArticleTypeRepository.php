<?php

namespace App\Repository;

use App\Entity\ArticleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleType[]    findAll()
 * @method ArticleType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleType::class);
    }

    // /**
    //  * @return ArticleType[] Returns an array of ArticleType objects
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
    public function findOneBySomeField($value): ?ArticleType
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
