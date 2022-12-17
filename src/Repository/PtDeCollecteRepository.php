<?php

namespace App\Repository;

use App\Entity\Ptdecollecte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ptdecollecte>
 *
 * @method Ptdecollecte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ptdecollecte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ptdecollecte[]    findAll()
 * @method Ptdecollecte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PtDeCollecteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ptdecollecte::class);
    }

    public function save(Ptdecollecte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Ptdecollecte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Ptdecollecte[] Returns an array of Ptdecollecte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ptdecollecte
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
