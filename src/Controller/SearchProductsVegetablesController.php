<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SearchProductsVegetablesController extends AbstractController
{
    // controleur afficher les produits de la catégorie légume
    #[Route('/search/products/vegetables', name: 'app_search_products_vegetables')]
    public function index(ProductRepository $productRepository): Response
    {
        $articlesVegetable = $productRepository->displayArticlesByFrutCategory(['légume']);

        return $this->render('search_products_vegetables/search_products_vegetables.html.twig', [
            'controller_name' => 'SearchProductsController',
            'articlesVegetables' =>  $articlesVegetable,

        ]);
    }

   #[Route('/search/vegetables', name: 'app_search_vegetables')]
    public function search(ProductRepository $productRepository, Request $request): Response
    {
        $search = $request->get('name');

        try {
            $result = $productRepository->searchInputValueVegetables($search);
            if (empty($result)) {
                throw new \Exception("Aucun résultat trouvé");
            }
            return $this->render('search_products_vegetables/search_products_vegetables.html.twig', [
                'controller_name' => 'SearchProductsVegetablesController',
                'articlesVegetables' => $productRepository->searchInputValueVegetables($search),
                'result' => $result,

            ]);
        } catch (\Exception $e) {
            return $this->render('search_products_vegetables/search_products_vegetables.html.twig', [
                'controller_name' => 'SearchProductsVegetablesController',
                'articlesVegetables' => $productRepository->searchInputValueVegetables($search),
                'error_message' => $e->getMessage()
            ]);
        }
    }
}




