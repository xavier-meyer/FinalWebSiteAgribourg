<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchProductsController extends AbstractController
{
    #[Route('/search/products', name: 'app_search_products')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $searchArticles =  $articleRepository -> findAll();

        return $this->render('search_products/search_products.html.twig', [
            'controller_name' => 'SearchProductsController',
            'searchArticles' =>  $searchArticles
        ]);
    }
}
