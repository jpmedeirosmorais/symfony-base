<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;  
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Carro;

class CarroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carro::class);
    }

    public function save(Carro $carro)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->persist($carro);
        $em->commit();
        $em->flush();
    }

    public function remove(Carro $carro)
    {
        $em=$this->getEntityManager();
        $em->beginTransaction();
        $em->remove($carro);
        $em->commit();
        $em->flush();
    }
}