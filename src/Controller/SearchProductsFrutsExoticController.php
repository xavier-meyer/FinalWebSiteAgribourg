<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\routing\Annotation\route;

class SearchProductsFrutsExoticController extends AbstractController
{
    // controller afficher les produits de la catégorie fruit exotique
    #[Route('/search/products/fruts/exotic', name: 'app_search_products_fruts_exotic')]
    public function index(ProductRepository $productRepository): Response
    {
        $articlesFrutsExotic = $productRepository->displayArticlesByFrutsExotic(['Fruit exotique']);

        return $this->render('search_products_fruts_exotic/search_products_fruts_exotic.html.twig', [
            'controller_name' => 'SearchProductsFrutsExoticController',
            'articlesFrutsExotic' =>  $articlesFrutsExotic,

        ]);
    }

}