<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SearchProductsController extends AbstractController
{
    // controleur afficher les produits de la catégorie fruit
    #[Route('/search/products', name: 'app_search_products')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articlesFrut = $articleRepository->displayArticlesByFrutCategory([1]);


        return $this->render('search_products/search_products.html.twig', [
            'controller_name' => 'SearchProductsController',
            'articlesFrut' => $articlesFrut,

        ]);
    }

    // controleur afficher produits de la base de la données en fonction de la recherche de l'utilisateur
    #[Route('/search', name: 'app_search')]
    public function search(ArticleRepository $articleRepository, Request $request): Response
    {
        /*  si le résultat de la requete dans articleRepository est vide, on retournes dans la vue TWIG le message d erreur stocké en session
          sinon on affiches le résultat, les produits concernées*/

        $search = $request->get('name');
        $result = $articleRepository->searchInputValueFrut($search);

        if (empty($_SESSION['error_message'])) {
            return $this->render('search_products/search_products.html.twig', [
                'controller_name' => 'SearchProductsController',
                'articlesFrut' => $articleRepository-> searchInputValueFrut($search),
                'result' => $result,
            ]);
        } else {
            return $this->render('search_products/search_products.html.twig', [
                'controller_name' => 'SearchProductsController',
                'articlesFrut' => $articleRepository-> searchInputValueFrut($search),
                'error_message' => $_SESSION['error_message']
            ]);
        }
    }
}
