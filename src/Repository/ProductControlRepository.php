<?php

namespace App\Repository;

use App\Entity\ProductControl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductControl|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductControl|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductControl[]    findAll()
 * @method ProductControl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductControlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductControl::class);
    }

    // /**
    //  * @return ProductControl[] Returns an array of ProductControl objects
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
    public function findOneBySomeField($value): ?ProductControl
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
