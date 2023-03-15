<?php

namespace App\Controller;


use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function displayProductsOnHomePage(ProductRepository $productRepository): Response
    {
        $products = $productRepository->displayArticlesByCategory(['fruit', 'légume', 'panier']);


        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products,

        ]);
    }
}
