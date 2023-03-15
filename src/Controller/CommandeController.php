<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\CommandeRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandeController extends AbstractController
{
    #[Route('/command/', name: 'app_command')]
    public function sentCommandToDatabase(SessionInterface $session, CommandeRepository $commandeRepository): Response
    {

        // création d'un fichier json

        session_start();

        $totalPrice = 0;
        // récuperer les données du panier dans la session
        $basket = $session->get('Basket');

        $basketProducts = array();

        if ($basket != null) {

            for ($i = 0; $i < count($basket); $i++) {

                $productName = $basket[$i]['name'];
                $productPrice = $basket[$i]['price'];
                // modifier format prix, rajouter le symbole euro
                $productPriceFormatted = number_format($productPrice, 2, ',', '') . '€';
                $basket[$i]['price'] = $productPriceFormatted;

                $productQuantity = $basket[$i]['quantity'];
                $productUnit = $basket[$i]['unit'];

                $totalProductPrice = $productPrice * $productQuantity;
                $totalPrice += $totalProductPrice;

                $basketProduct = array('name' => $productName, 'price' => $basket[$i]['price'], 'quantity' => $productQuantity, 'unit' => $productUnit);

                // On sélectionne le dernier produit et on affiche le prix total
                if ($i == count($basket) - 1) {
                    $totalPriceFormatted = number_format($totalPrice, 2, ',', '') . '€';
                    $basketProduct[$i]['totalPrice'] = $totalPriceFormatted;
                }

                // ajout du produit au tableau
                $basketProducts[] = $basketProduct;

            }

            $json = json_encode($basketProducts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            // fin création fichier json


            $command = new Commande;

            // stocker la date de validation du panier
            $date = new DateTimeImmutable();

            // mettre la date au format chaine de caractères pour l'afficher dans la vue
            $newDate = $date->format('d-m-Y');

            // user
            $command->setUser($this->getUser())->getId();
            $command->setCommandProductDate($date);
            $command->setJsonCommand((array)$json);

            // envoyer en base de données la commande
            $commandeRepository->save($command, true);

        }

        // afficher toutes les commandes sur la vue

        $userCommandes = $commandeRepository->findBy(
            ['user' => $this->getUser()->getId()],
            ['id' => 'DESC']
        );

        if($basket != null) {
            $messageConfirmationCommand = "Votre commande a bien été prise en compte! merci de votre confiance";
            $newDate = $date->format('d-m-Y');
            $summaryOrderTitle = "Récapitulatif de votre commande";
            $userDerniereCommande = $userCommandes[0];
            $commandeData = json_decode($userDerniereCommande->getJsonCommand()[0]);
            $totalPriceOrder = "prix total:";
            $dateOrder = "commande effectuée le:";
            $totalPrice =  number_format($totalPrice, 2, ',', '') . '€';

        } else {
            $messageConfirmationCommand = "Votre panier est vide";
            $newDate = "";
            $summaryOrderTitle = "";
            $userDerniereCommande = "";
            $commandeData = "";
            $totalPriceOrder = "";
            $dateOrder = "";
            $totalPrice = "";
        }

        // vider le panier utilisateur stocké en session
        $basket = $session->remove('Basket');

        return $this->render('command/command.html.twig', [
            'controller_name' => 'CommandeController',
            'totalPrice' => $totalPrice,
            'messageConfirmationCommand' => $messageConfirmationCommand,
            'summaryOrderTitle' => $summaryOrderTitle,
            'userDerniereCommande' => $userDerniereCommande,
            'commande' => $commandeData,
            'date' => $newDate,
            'totalPriceOrder' => $totalPriceOrder,
            'dateOrder' => $dateOrder,
        ]);

    }
}






















