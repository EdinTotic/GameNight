<?php

namespace App\Repository;

use App\Entity\Invites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Invites>
 *
 * @method Invites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Invites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Invites[]    findAll()
 * @method Invites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invites::class);
    }

    /**
     * @return Invites[] Returns an array of Invites objects
     */
    public function FindByUserInvites($userId): array
    {
        return $this->createQueryBuilder('i')
            ->select(["i.status", 'invr.username', 'gn.location', 'i.id', 'gn.id as gnID', 'i.type', 'invr.id as inviter'])
            ->join('i.fk_user_inviter', 'invr')
            ->join('i.fk_gamenight_id', 'gn')
            ->andWhere('i.fk_user_invitee = :val')
            ->setParameter('val', $userId)
            ->orderBy('i.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function FindByUserRequests($userId): array
    {
        return $this->createQueryBuilder('i')
            ->select(["i.status", 'invr.username', 'gn.location', 'i.id', 'gn.id as gnID', 'i.type', 'invr.id as inviter', 'inve.username as inveuser', 'inve.id as inveid'])
            ->join('i.fk_user_inviter', 'invr')
            ->join('i.fk_user_invitee', 'inve')
            ->join('i.fk_gamenight_id', 'gn')
            ->andWhere('i.fk_user_inviter = :val')
            ->setParameter('val', $userId)
            ->orderBy('i.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function InviteExist($userId, $game_night_id)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.fk_user_invitee = :user AND i.fk_gamenight_id = :game_night')
            ->setParameter('user', $userId)
            ->setParameter('game_night', $game_night_id)
            ->orderBy('i.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Invites
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
