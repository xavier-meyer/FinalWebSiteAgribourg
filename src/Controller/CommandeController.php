<?php

namespace App\Controller;

use App\Entity\Commande;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\CommandeRepository;

class CommandeController extends AbstractController
{
    #[Route('/command', name: 'app_command')]
    public function index(SessionInterface $session, CommandeRepository $commandRepository ): Response
    {
        // récuperer le panier depuis la session

        $basket = $session->get('Basket', []);

        $totalPrice = 0;

        // boucler sur chaque produit dans le panier
        foreach ($basket as $item) {

            // créer un nouvel objet Commande
            $command = new Commande();

            // prix total de chaque produit

            $itemTotalPrice = $item['price'] * $item['quantity'];
            $totalPrice += $itemTotalPrice;

            $lastProduct = end($basket);

                // stocker la date de validation du panier

            $date  = new DateTimeImmutable();

            // on récupéres les valeurs de produits stockées en session via $item
            // on envoyes les données dans la base de données avec les setters

            $command->setCommandProductName($item['name']);
            $command->setCommandProductPrice($item['price']);
            $command->setCommandProductQuantity($item['quantity']);
            $command->setCommandProductPriceUnit($item['price_unit']);

            $command->setCommandProductTotalPrice($itemTotalPrice);
            if($item === $lastProduct) {
                $command->setCommandTotalPrice($totalPrice);
            }
            $command->setCommandProductDate($date);

            // stocker les produits dans une variable $orderProduct
            $orderProduct = $command;

            // Enregistrez chaque produit en base de données
            $commandRepository->save($orderProduct, true);

        }

        return $this->render('order/order.html.twig');
    }
}

