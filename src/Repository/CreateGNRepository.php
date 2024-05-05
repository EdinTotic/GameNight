<?php

namespace App\Repository;

use App\Entity\CreateGN;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreateGN>
 *
 * @method CreateGN|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreateGN|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreateGN[]    findAll()
 * @method CreateGN[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreateGNRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreateGN::class);
    }

//    /**
//     * @return CreateGN[] Returns an array of CreateGN objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CreateGN
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
