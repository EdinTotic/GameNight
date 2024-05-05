<?php

namespace App\Repository;

use App\Entity\GamenightTags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GamenightTags>
 *
 * @method GamenightTags|null find($id, $lockMode = null, $lockVersion = null)
 * @method GamenightTags|null findOneBy(array $criteria, array $orderBy = null)
 * @method GamenightTags[]    findAll()
 * @method GamenightTags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamenightTagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GamenightTags::class);
    }

    /**
     * @return GamenightTags[] Returns an array of GamenightTags objects
     */
    public function FindAllTagsForGameNight($value): array
    {
        return $this->createQueryBuilder('g')
            ->select('t.name')
            ->join('g.fk_tag_id', 't')
            ->andWhere('g.fk_gamenight_id = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function GameNightHasTag($value): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.fk_tag_id = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function FindGamenightsByTag($value): array
    {
        return $this->createQueryBuilder('g')
            ->select(array('gn.id'))
            ->andWhere('t.name = :val')
            ->join('g.fk_tag_id', 't')
            ->join('g.fk_gamenight_id', 'gn')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?GamenightTags
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
