<?php

namespace App\Repository;

use App\Entity\GamenightSnacks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GamenightSnacks>
 *
 * @method GamenightSnacks|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamenightSnacks|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamenightSnacks[]    findAll()
 * @method GamenightSnacks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamenightSnacksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamenightSnacks::class);
    }

    /**
     * @return GamenightSnacks[] Returns an array of GamenightSnacks objects
     */
    public function GetGameNightSnacks($gnId): array
    {
        return $this->createQueryBuilder('g')
            ->select('s.name', 's.type', 'u.username', 'g.quantity')
            ->join('g.fk_gamenight_id', 'gn')
            ->join('g.fk_snack_id', 's')
            ->join('g.fk_user_Id', 'u')
            ->andWhere('g.fk_gamenight_id = :val')
            ->setParameter('val', $gnId)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function GetMostAddedSnacks(): array
    {
        return $this->createQueryBuilder('g')
            ->select('s.name', 'COUNT(s.name) as count')
            ->join('g.fk_gamenight_id', 'gn')
            ->join('g.fk_snack_id', 's')
            ->groupBy('g.fk_snack_id')
            ->orderBy('COUNT(g.fk_snack_id)', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?GamenightSnacks
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
