<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchProductsVegetablesController extends AbstractController
{
    #[Route('/search/products/vegetables', name: 'app_search_products_vegetables')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articlesVegetables = $articleRepository->displayArticlesByVegetableCategory([2]);

        return $this->render('search_products_vegetables/search_products_vegetables.html.twig', [
            'controller_name' => 'SearchProductsVegetablesController',
            'articlesVegetables' => $articlesVegetables
        ]);
    }
}
