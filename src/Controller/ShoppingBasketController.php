<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingBasketController extends AbstractController
{
    #[Route('/shopping/basket', name: 'app_shopping_basket')]
    public function index(SessionInterface $session): Response
    {
        $totalPrice = 0;
        $basket = $session->get('Basket', []);


        foreach ($basket as $item) {

            $totalPrice += $item['price'] * $item['quantity'];

        }

        return $this->render('shopping_basket/shopping_basket.html.twig', [
            'totalPriceController' => $totalPrice

       ]);

    }

    #[Route('/add/to/basket/{id}', name: 'app_add_basket')]
    public function addtocart(ProductRepository $productRepository, $id, SessionInterface $session, Request $request): Response
    {

        $basket = $session->get('Basket', []);
        $product = $productRepository->find($id);
        $productName = $product->getproduct_name();
        $productPrice = $product->getproduct_price();
        $productPriceUnit = $product->getproduct_price_unit();
        $totalPrice = 0;


        // Vérifier si le produit est déja dans le panier
        $foundProduct = false;
        foreach ($basket as $item) {
            if ($item['name'] === $productName) {
                $item['quantity']++;
                $foundProduct = true;
                break;
            }
        }

        // si le produit n'y est pas, on mets la quantité à 1
        if (!$foundProduct) {
            $item = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1,
                'price_unit' => $productPriceUnit,

            ];

            $basket[] = $item;

            $session->set('Basket', $basket);

        }
        foreach ($basket as $item) {

            $totalPrice += $item['price'] * $item['quantity'];

        }

        return $this->render('shopping_basket/shopping_basket.html.twig', [
            'totalPriceController' => $totalPrice

        ]);
    }
}
    // explication
    //On récupère le contenu du panier depuis la session, ou on crée un nouveau panier vide si la session ne contient pas de panier
    // On récupère le produit correspondant à l'identifiant passé en paramètre
    // on récupére les propriétés du produit via les méthodes get
    // on initialises une variable $totalPrice à zero
    // on vérifies si le produit est deja dans le panier ou pas, si pas, on le rajoute au panier
    // On enregistre le panier dans la session
    // on effectues la somme des produits ajoutées et on affectes cette valeur à $totalprice


