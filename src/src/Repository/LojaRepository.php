<?php

namespace App\Repository;

use App\Entity\Loja;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Loja|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loja|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loja[]    findAll()
 * @method Loja[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LojaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loja::class);
    }

    // /**
    //  * @return Loja[] Returns an array of Loja objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Loja
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
