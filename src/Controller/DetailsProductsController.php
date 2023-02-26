<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsProductsController extends AbstractController
{
//    Dans ce cas, la variable $id contiendra la valeur du paramètre id passé dans l'URL et
//    sera utilisée pour récupérer le produit à partir du référentiel.

    #[Route('/details/products/{id}', name: 'app_details_products')]
    public function index(ProductRepository $productRepository, $id): Response
    {

       $detailsProducts = $productRepository->find($id);


        return $this->render('details_products/details_products.html.twig', [

            'item' => $detailsProducts,

        ]);
    }
}
