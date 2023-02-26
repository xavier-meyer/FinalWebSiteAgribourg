<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function save(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



    public function remove(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    requete cards page home

    public function displayArticlesByCategory(array $categs): array
    {
        //Création d'un constructeur de requête
        return $this->createQueryBuilder('m')
            //Filtrer les résultats en fonction de la catégorie de l'article
            ->where('m.product_category IN (:product_category)')
            //Définir les catégories spécifiées dans le tableau en tant que paramètre pour la requête
            ->setParameter('product_category', $categs)
            //Filtrer les résultats pour n'inclure que les articles qui ont un prix
            ->andWhere('m.product_price < 3')
            //Limiter le nombre de résultats retournés à 10
            ->setMaxResults(10)
            //Obtenir les résultats de la requête sous forme d'un tableau
            ->getQuery()
            ->getResult();
    }

    // requete cards page produit fruit

    public function displayArticlesByFrutCategory(array $categsFrut): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.product_category IN (:product_category)')
            ->setParameter('product_category', $categsFrut)
            ->getQuery()
            ->getResult();
    }

    // requete cards page produit légume

    public function displayArticlesByVegetableCategory(array $categsFrut): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.product_category IN (:product_category)')
            ->setParameter('product_category', $categsFrut)
            ->getQuery()
            ->getResult();
    }

    // requete cards page produit panier

    public function displayArticlesByBasketsCategory(array $categsBasket): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.product_category IN (:product_category)')
            ->setParameter('product_category', $categsBasket)
            ->getQuery()
            ->getResult();
    }

    // requete cards page produit fruit exotique

    public function displayArticlesByFrutsExotic(array $categFrutsExotic) : array
    {
        return $this->createQueryBuilder('m')
            ->where('m.product_category IN (:product_category)')
            ->setParameter('product_category', $categFrutsExotic)
            ->getQuery()
            ->getResult();

    }

    //  repository page produits search fruits
    // fonctionnalité: chercher les produits par l'input en fonction des entrées de l'utilisateur

    public function searchInputValueFrut(string $where): array
    {
        return $this->createQueryBuilder('article')
            ->where(' article.product_name like :w')
            ->andWhere("article.product_category = 'fruit'")
            ->setParameter(':w', $where . '%')
            ->getQuery()
            ->getResult();
    }

    // repository page produits search legumes

    public function searchInputValueVegetables(string $where): array
    {
        return $this->createQueryBuilder('article')
            ->where(' article.product_name like :w')
            ->andWhere("article.product_category = 'légume'")
            ->setParameter(':w', $where . '%')
            ->getQuery()
            ->getResult();
    }

//            repository page produits search panier

    public function searchInputValueBaskets(string $where): array
    {
        return $this->createQueryBuilder('article')
            ->where(' article.product_name like :w')
            ->andWhere("article.product_category = 'panier'")
            ->setParameter(':w', '%' . $where . '%')
            ->getQuery()
            ->getResult();
    }

}

//    /**
//     * @return Product[] Returns an array of Product objects
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

//    public function findOneBySomeField($value): ?Product
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

