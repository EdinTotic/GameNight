<?php

namespace App\Repository;

use App\Entity\GamenightParticipant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GamenightParticipant>
 *
 * @method GamenightParticipant|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamenightParticipant|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamenightParticipant[]    findAll()
 * @method GamenightParticipant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamenightParticipantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamenightParticipant::class);
    }

    //    /**
    //     * @return GamenightParticipant[] Returns an array of GamenightParticipant objects
    //     */
    public function FindByGameID($value): array
    {
        return $this->createQueryBuilder('g')
            ->select(['gn.id', 'gn.date', 'gn.location'])
            ->join('g.fk_gamenight_id', 'gn')
            ->andWhere('g.fk_user_id = :val')
            ->setParameter('val', $value)
            ->orderBy('gn.date', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?GamenightParticipant
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
