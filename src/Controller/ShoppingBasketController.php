<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingBasketController extends AbstractController
{
    #[Route('/shopping/basket', name: 'app_shopping_basket')]
    public function index(): Response
    {
        return $this->render('shopping_basket/shopping_basket.html.twig');

    }

    #[Route('/add/to/basket/{id}', name: 'app_add_basket')]
    public function addtocart(ProductRepository $productRepository, $id, SessionInterface $session): Response
    {
        $basket = $session->get('Basket', []);
        $product = $productRepository->find($id);
        $basket[] = $product;
        $session->set('Basket', $basket);
        return $this->redirectToRoute('app_shopping_basket');

    }
}

    // explication
    //On récupère le contenu du panier depuis la session, ou on crée un nouveau panier vide si la session ne contient pas de panier
    // On récupère le produit correspondant à l'identifiant passé en paramètre
    // On ajoute le produit au panier
    // On enregistre le panier dans la session
    // on rediriges l'utilisateur vers la page du panier