<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SearchProductsController extends AbstractController
{
    // controleur afficher les produits de la catégorie fruit
    #[Route('/search/products', name: 'app_search_products')]
    public function index(ProductRepository $productRepository): Response
    {
        $articlesFrut = $productRepository->displayArticlesByFrutCategory(['fruit']);

        return $this->render('search_products/search_products.html.twig', [
            'controller_name' => 'SearchProductsController',
            'articlesFrut' => $articlesFrut,

        ]);
    }

//    le bloc try contient le code qui peut potentiellement générer une exception.
//    Si aucun produit n'est trouvé, une exception est lancée avec le message "Aucun résultat trouvé".
//
//    Le bloc catch intercepte l'exception lancée dans le bloc try
//    et affiche le message d'erreur en utilisant la méthode getMessage sur l'objet d'exception $e.
//

    // controleur afficher produits de la base de la données en fonction de la recherche de l'utilisateur
    #[Route('/search', name: 'app_search')]
    public function search(ProductRepository $productRepository, Request $request): Response
    {
        $search = $request->get('name');

        try {
            $result = $productRepository->searchInputValueFrut($search);
            if (empty($result)) {
                throw new \Exception("Aucun résultat trouvé");
            }
            return $this->render('search_products/search_products.html.twig', [
                'controller_name' => 'SearchProductsController',
                'articlesFrut' => $productRepository->searchInputValueFrut($search),
                'result' => $result,

            ]);
        } catch (\Exception $e) {
            return $this->render('search_products/search_products.html.twig', [
                'controller_name' => 'SearchProductsController',
                'articlesFrut' => $productRepository->searchInputValueFrut($search),
                'error_message' => $e->getMessage()
            ]);
        }
    }
}


