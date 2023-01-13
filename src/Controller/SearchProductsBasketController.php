<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchProductsBasketController extends AbstractController
{
    #[Route('/search/products/basket', name: 'app_search_products_basket')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articlesBaskets = $articleRepository-> displayArticlesByBasketsCategory([3]);

        return $this->render('search_products_baskets/search_products_baskets.html.twig', [
            'controller_name' => 'SearchProductsBasketController',
            'articlesBaskets'=> $articlesBaskets
        ]);
    }

    // controleur afficher produits de la base de la données en fonction de la recherche de l'utilisateur
    #[Route('/search/baskets', name: 'app_search_baskets')]
    public function search(ArticleRepository $articleRepository, Request $request): Response
    {
        /*  si le résultat de la requete dans articleRepository est vide, on retournes dans la vue TWIG le message d erreur stocké en session
          sinon on affiches le résultat, les produits concernées*/

        $search = $request->get('name');
        $result = $articleRepository->searchInputValueBaskets($search);

        if (empty($_SESSION['error_message'])) {
            return $this->render('search_products_baskets/search_products_baskets.html.twig', [
                'controller_name' => 'SearchProductsBasketController',
                'articlesBaskets' => $articleRepository->searchInputValueBaskets($search),
                'result' => $result,
            ]);
        } else {
            return $this->render('search_products_baskets/search_products_baskets.html.twig', [
                'controller_name' => 'SearchProductsBasketController',
                'articlesBaskets' => $articleRepository->searchInputValueBaskets($search),
                'error_message' => $_SESSION['error_message']
            ]);
        }
    }
}
