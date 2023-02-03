<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingBasketController extends AbstractController
{
    #[Route('/shopping/basket', name: 'app_shopping_basket')]
    public function index(): Response
    {
        return $this->render('shopping_basket/shopping_basket.html.twig', [
            'controller_name' => 'ShoppingBasketController',
        ]);
    }

    #[Route('/add/to/basket/{id}', name: 'app_add_basket')]
    public function addtocart(ArticleRepository $articleRepository, $id, SessionInterface $session): Response
    {
        $basket = $session->get('Basket', []);
        $product = $articleRepository->find($id);
        $basket[] = $product;
        $session->set('Basket', $basket);
        return $this->redirectToRoute('app_shopping_basket');
    }
}
