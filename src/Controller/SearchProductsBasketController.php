<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchProductsBasketController extends AbstractController
{
    #[Route('/search/products/basket', name: 'app_search_products_baskets')]
    public function displayBaskets(ProductRepository $productRepository): Response
    {
        $articlesBaskets = $productRepository-> displayArticlesByBasketsCategory(['panier']);

        return $this->render('search_products_baskets/search_products_baskets.html.twig', [
            'controller_name' => 'SearchProductsBasketController',
            'articlesBaskets'=> $articlesBaskets
        ]);
    }

    // controleur afficher produits de la base de la données en fonction de la recherche de l'utilisateur
    #[Route('/search/basket', name: 'app_search_baskets')]
    public function searchBaskets(ProductRepository $productRepository, Request $request): Response
    {
        $search = $request->get('name');

        try {
            $result = $productRepository->searchInputValueBaskets($search);
            if (empty($result)) {
                throw new \Exception("Aucun résultat trouvé");
            }
            return $this->render('search_products_baskets/search_products_baskets.html.twig', [
                'controller_name' => 'SearchProductsBasketController',
                'articlesBaskets' => $productRepository->searchInputValueBaskets($search),
                'result' => $result,

            ]);
        } catch (\Exception $e) {
            return $this->render('search_products_baskets/search_products_baskets.html.twig', [
                'controller_name' => 'SearchProductsBasketController',
                'articlesBaskets' => $productRepository->searchInputValueBaskets($search),
                'error_message' => $e->getMessage()
            ]);
        }
    }
}
