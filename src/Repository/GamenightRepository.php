<?php

namespace App\Repository;

use App\Entity\Gamenight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gamenight>
 *
 * @method Gamenight|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gamenight|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gamenight[]    findAll()
 * @method Gamenight[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamenightRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gamenight::class);
    }
    /**
     * @return Gamenight[] Returns an array of Gamenight objects
     */
    public function FindGNCreator($value): array
    {
        return $this->createQueryBuilder('g')
            ->select('gu.id', 'gu.username')
            ->join('g.fk_user_id', 'gu')
            ->andWhere('g.id = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function GetMostAddedGames(): array
    {
        return $this->createQueryBuilder('g')
            ->select('game.name', 'COUNT(game.name) as count')
            ->join('g.fk_game_id', 'game')
            ->groupBy('g.fk_game_id')
            ->orderBy('COUNT(g.fk_game_id)', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    public function GetMostGameNightHoster(): array
    {
        return $this->createQueryBuilder('g')
            ->select('u.username', 'COUNT(u.username) as count')
            ->join('g.fk_user_id', 'u')
            ->groupBy('g.fk_user_id')
            ->orderBy('COUNT(g.fk_user_id)', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Gamenight
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
