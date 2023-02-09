<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function save(Article $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Article $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    //  @return Article[] Returns an array of Article objects

//    public function displayArticlesByCategory(array $categs): array
//    {
//            //Création d'un constructeur de requête
//        return $this->createQueryBuilder('m')
//            //Filtrer les résultats en fonction de la catégorie de l'article
//            ->where('m.catproduit IN (:catproduit)')
//            //Définir les catégories spécifiées dans le tableau en tant que paramètre pour la requête
//            ->setParameter('catproduit', $categs)
//            //Filtrer les résultats pour n'inclure que les articles qui ont un prix en promotion
//            ->andWhere('m.artprixpromo IS NOT NULL')
//            //Limiter le nombre de résultats retournés à 10
//            ->setMaxResults(10)
//            //Obtenir les résultats de la requête sous forme d'un tableau
//            ->getQuery()
//            ->getResult();
//    }
//
//    public function displayArticlesByFrutCategory(array $categsFrut): array
//    {
//        return $this->createQueryBuilder('m')
//            ->where('m.catproduit IN (:catproduit)')
//            ->setParameter('catproduit', $categsFrut)
//            ->getQuery()
//            ->getResult();
//    }
//
//    public function displayArticlesByVegetableCategory(array $categsVegetable): array
//    {
//        return $this->createQueryBuilder('m')
//            ->where('m.catproduit IN (:catproduit)')
//            ->setParameter('catproduit', $categsVegetable)
//            ->getQuery()
//            ->getResult();
//    }
//
//    public function displayArticlesByBasketsCategory(array $categsBasket): array
//    {
//        return $this->createQueryBuilder('m')
//            ->where('m.catproduit IN (:catproduit)')
//            ->setParameter('catproduit', $categsBasket)
//            ->getQuery()
//            ->getResult();
//    }


//    dans ce repository, on stockes dans $_session : $_session['error_message'] un message d erreur si la requete ne retournes aucun résultat
    //        repository page produits search fruits

    public function searchInputValueFrut($where): array
    {
        $queryBuilder = $this->createQueryBuilder("article");
        $queryBuilder->where(' article.artnomproduit like :w');
        $queryBuilder->andWhere('article.catproduit = 1');
        $queryBuilder->setParameter(':w', $where . '%');
        $result = $queryBuilder->getQuery()->getResult();
        if (empty($result)) {
            $_SESSION['error_message'] = "Aucun résultat trouvé";
        }
        return $result;
    }
    //        repository page produits search legumes
    public function searchInputValueVegetables($where): array
    {
        $queryBuilder = $this->createQueryBuilder("article");
        $queryBuilder->where(' article.artnomproduit like :w');
        $queryBuilder->andWhere('article.catproduit = 2');
        $queryBuilder->setParameter(':w',  $where . '%');
        $result = $queryBuilder->getQuery()->getResult();
        if(empty($result)) {
            $_SESSION['error_message'] = "Aucun résultat trouvé";
        }
        return $result;
    }
    //        repository page produits search panier
    public function searchInputValueBaskets($where): array
    {
        $queryBuilder = $this->createQueryBuilder("article");
        $queryBuilder->where(' article.artnomproduit like :w');
        $queryBuilder->andWhere('article.catproduit = 3');
        $queryBuilder->setParameter(':w',  '%' . $where . '%');
        $result = $queryBuilder->getQuery()->getResult();
        if(empty($result)) {
            $_SESSION['error_message'] = "Aucun résultat trouvé";
        }
        return $result;
    }
}



   /*    $conn = $this-> getEntityManager()->getConnection();

//        $sql = '
//            SELECT * FROM article
//            WHERE article.catproduit = "1"
//            AND article.artprixpromo IS NOT NULL
//            UNION
//            SELECT * FROM article
//            WHERE article.catproduit = "2"
//            AND article.artprixpromo IS NOT NULL
//            UNION
//            SELECT * FROM article
//            WHERE article.catproduit = "3"
//            AND article.artprixpromo IS NOT NULL
//            LIMIT 10
        ';

        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery();

        return $result->fetchAllAssociative();*/


//    public function displayArticlesByCategoryLegume() : array
//    {
//        $conn1 = $this-> getEntityManager()->getConnection();
//
//        $sql1 = '
//            SELECT * FROM article
//            WHERE article.catproduit = "2"
//            AND article.artprixpromo IS NOT NULL
//            LIMIT 4
//       ';
//
//        $stmt1 = $conn1->prepare($sql1);
//        $result1 = $stmt1->executeQuery();
//
//        return $result1->fetchAllAssociative();





//      return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//
//

//    public function findOneBySomeField($value): ?Article
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

