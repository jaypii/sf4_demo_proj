<?php

namespace App\Repository;

use App\Entity\TestEnt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestEnt|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestEnt|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestEnt[]    findAll()
 * @method TestEnt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestEntRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestEnt::class);
    }

    // /**
    //  * @return TestEnt[] Returns an array of TestEnt objects
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
    public function findOneBySomeField($value): ?TestEnt
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
