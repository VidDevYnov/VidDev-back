<?php

namespace App\Repository;

use App\Entity\ArticleState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleState|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleState|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleState[]    findAll()
 * @method ArticleState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleStateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleState::class);
    }

    // /**
    //  * @return ArticleState[] Returns an array of ArticleState objects
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
    public function findOneBySomeField($value): ?ArticleState
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
