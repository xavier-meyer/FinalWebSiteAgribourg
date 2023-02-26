<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\routing\Annotation\route;

class SearchProductsFrutsExoticController extends AbstractController
{
    // controller afficher les produits de la catégorie fruit exotique
    #[Route('/search/products/fruts/exotic', name: 'app_search_products_fruts_exotic')]
    public function displayFrutsExotic(ProductRepository $productRepository): Response
    {
        $articlesFrutsExotic = $productRepository->displayArticlesByFrutsExotic(['fruit exotique']);

        return $this->render('search_products_fruts_exotic/search_products_fruts_exotic.html.twig', [
            'controller_name' => 'SearchProductsFrutsExoticController',
            'articlesFrutsExotic' =>  $articlesFrutsExotic,

        ]);
    }

    //    le bloc try contient le code qui peut potentiellement générer une exception.
    //    Si aucun produit n'est trouvé, une exception est lancée avec le message "Aucun résultat trouvé".
    //
    //    Le bloc catch intercepte l'exception lancée dans le bloc try
    //    et affiche le message d'erreur en utilisant la méthode getMessage sur l'objet d'exception $e.
    //

    #[Route('/search/fruts/exotic',  name: 'app_search_fruts_exotic')]
    public function searchFrutsExotic(ProductRepository $productRepository, Request $request): Response
    {
        $search = $request->get('name');

        try {
            $result = $productRepository->searchInputValueFrutsExotic($search);
            if (empty($result)) {
                throw new \Exception("Aucun résultat trouvé");
            }
            return $this->render('search_products_fruts_exotic/search_products_fruts_exotic.html.twig', [
                'controller_name' => 'SearchProductsFrutsExoticController',
                'articlesFrutsExotic' => $productRepository->searchInputValueFrutsExotic($search),
                'result' => $result,

            ]);
        } catch (\Exception $e) {
            return $this->render('search_products_fruts_exotic/search_products_fruts_exotic.html.twig', [
                'controller_name' => 'SearchProductsFrutsExoticController',
                'articlesFrutsExotic' => $productRepository->searchInputValueFrutsExotic($search),
                'error_message' => $e->getMessage()
            ]);
        }

    }
}