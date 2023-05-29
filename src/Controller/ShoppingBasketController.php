<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShoppingBasketController extends AbstractController
{

    #[Route('/shopping/basket/', name: 'app_shopping_basket')]
    public function displayCart(SessionInterface $session): Response
    {
        $totalPrice = 0;
        $basket = $session->get('Basket', []);

        foreach ($basket as $item) {
            $totalPrice += $item['price'] * $item['quantity'];

        }

        return $this->render('shopping_basket/shopping_basket.html.twig', [
            'totalPriceController' => $totalPrice,
        ]);

    }

    #[Route('/add/to/basket/{id}', name: 'app_add_basket')]
    public function addToCart(ProductRepository $productRepository, $id, SessionInterface $session): Response
    {

        // 'Basket' permet d'accéder à une variable de session nommé 'Basket'
        // 'Basket' stocke les informations relatives au panier d'achat d'un utilisateur
        //On récupère le contenu du panier depuis la session, ou on crée un nouveau panier vide si la session ne contient pas de panier
        $basket = $session->get('Basket', []);

        // On récupère le produit correspondant à l'identifiant passé en paramètre
        $product = $productRepository->find($id);

        // on récupére les propriétés du produit via les méthodes get
        $productName = $product->getProductName(); // nom du produit
        $productPrice = $product->getProductPrice(); // prix du produit
        $productUnit = $product->getUnit()->getUnitProduct(); // unité du produit
        $productImage = $product->getProductImage(); // nom de l'image du produit
        $productId = $product->getId(); // id du produit

        // on initialises les variables $totalPrice à zero et $productQuantity  à 1
        $productQuantity = 1;
        $totalPrice = 0;

        // Vérifier si le produit est déja dans le panier
        $foundProduct = false;
        foreach ($basket as $item) {
            if ($item['name'] === $productName) {
                $foundProduct = true;
                break;

            }
        }

        // création d'un tableau contenant le produit
        if (!$foundProduct) {
            $item = [
                'name' => $productName,
                'price' => $productPrice,
                'unit' => $productUnit,
                'quantity' => $productQuantity,
                'image' => $productImage,
                'id' => $productId,
            ];
            $basket[] = $item;

            // On enregistre le panier dans la session
            $session->set('Basket', $basket);
        }
        // on effectues la somme des produits ajoutées et on affectes cette valeur à $totalprice
        foreach ($basket as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $this->render('shopping_basket/shopping_basket.html.twig', [
            'totalPriceController' => $totalPrice,
            'id' => $productId,
        ]);
    }

    #[Route('/remove/to/basket/{id}', name: 'app_remove_basket')]
    public function removeToCart(SessionInterface $session, ProductRepository $productRepository, $id): Response
    {
        $totalPrice = 0;
        $basket = $session->get('Basket', []);

        // on récupéres les ids du produit sélectionné quand on cliques sur supprimer

        $product = $productRepository->find($id);
        $productId = $product->getId();

        foreach ($basket as $index => $item) {
            if ($item['id'] == $productId) {
                unset($basket[$index]);
            }
        }

        // mettre à jour la variable de session 'Basket' avec le nouveau panier
        $session->set('Basket', $basket);

        // mettre à jour le prix total de la commande
        foreach ($basket as $item) {
            // on effectues la somme des produits ajoutées et on affectes cette valeur à $totalprice
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $this->render('shopping_basket/shopping_basket.html.twig', [
            'totalPriceController' => $totalPrice,
            'id' => $productId,
        ]);
    }

}





