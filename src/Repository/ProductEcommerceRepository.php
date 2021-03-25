<?php

namespace App\Repository;

use App\Entity\ProductEcommerce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductEcommerce|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductEcommerce|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductEcommerce[]    findAll()
 * @method ProductEcommerce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductEcommerceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductEcommerce::class);
    }

    // /**
    //  * @return ProductEcommerce[] Returns an array of ProductEcommerce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductEcommerce
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
