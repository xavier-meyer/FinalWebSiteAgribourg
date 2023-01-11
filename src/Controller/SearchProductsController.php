<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class SearchProductsController extends AbstractController
{
    #[Route('/search/products', name: 'app_search_products')]
    public function index(ArticleRepository $articleRepository, Request$request ): Response
    {
        $articlesFrut = $articleRepository->displayArticlesByFrutCategory([1]);


        return $this->render('search_products/search_products.html.twig', [
            'controller_name' => 'SearchProductsController',
            'articlesFrut' => $articlesFrut,
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(ArticleRepository $articleRepository, Request $request ): Response
    {
        $key = $request->get('name');


        return $this->render('search_products/search_products.html.twig', [
            'controller_name' => 'SearchProductsController',
            'articlesFrut' => $articleRepository->maRequete($key),
        ]);
    }
}
