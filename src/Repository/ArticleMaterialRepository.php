<?php

namespace App\Repository;

use App\Entity\ArticleMaterial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleMaterial|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleMaterial|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleMaterial[]    findAll()
 * @method ArticleMaterial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleMaterialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleMaterial::class);
    }

    // /**
    //  * @return ArticleMaterial[] Returns an array of ArticleMaterial objects
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
    public function findOneBySomeField($value): ?ArticleMaterial
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
