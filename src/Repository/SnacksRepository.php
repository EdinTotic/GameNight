<?php

namespace App\Repository;

use App\Entity\Snacks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Snacks>
 *
 * @method Snacks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Snacks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Snacks[]    findAll()
 * @method Snacks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SnacksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Snacks::class);
    }

    /**
     * @return Snacks[] Returns an array of Snacks objects
     */
    public function GetSnackTypes(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.type')
            ->groupBy('s.type')
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Snacks
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
