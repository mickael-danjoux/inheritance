<?php

namespace App\Repository;

use App\Entity\PrivateIndividual;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PrivateIndividual|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateIndividual|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateIndividual[]    findAll()
 * @method PrivateIndividual[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateIndividualRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateIndividual::class);
    }

    // /**
    //  * @return PrivateIndividual[] Returns an array of PrivateIndividual objects
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
    public function findOneBySomeField($value): ?PrivateIndividual
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
