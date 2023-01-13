<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    // controleur afficher produits de la base de la données en fonction de la recherche de l'utilisateur
    #[Route('/search/Vegetables', name: 'app_search_vegetables')]
    public function search(ArticleRepository $articleRepository, Request $request): Response
    {
        /*  si le résultat de la requete dans articleRepository est vide, on retournes dans la vue TWIG le message d erreur stocké en session
          sinon on affiches le résultat, les produits concernées*/

        $search = $request->get('name');
        $result = $articleRepository->searchInputValueVegetables($search);

        if (empty($_SESSION['error_message'])) {
            return $this->render('search_products_vegetables/search_products_vegetables.html.twig', [
                'controller_name' => 'SearchProductsController',
                'articlesVegetables' => $articleRepository->searchInputValueVegetables($search),
                'result' => $result,
            ]);
        } else {
            return $this->render('search_products_vegetables/search_products_vegetables.html.twig', [
                'controller_name' => 'SearchProductsController',
                'articlesVegetables' => $articleRepository->searchInputValueVegetables($search),
                'error_message' => $_SESSION['error_message']
            ]);
        }
    }

}


