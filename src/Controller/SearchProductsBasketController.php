<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
