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

        $json = '';

        if ($basket != null) {
            foreach ($basket as $item) {
                $productName = $item['name'];
                $productPrice = $item['price'];
                // modifier format prix, rajouter le symbole euro
                $productPriceFormatted = number_format($productPrice, 2, ',', '') . '€';
                $item['price'] = $productPriceFormatted;

                $productQuantity = $item['quantity'];
                $productUnit = $item['unit'];

                $totalProductPrice = $productPrice * $productQuantity;
                $totalPrice += $totalProductPrice;

                $basketProduct = ['name' => $productName, 'price' => $item['price'], 'quantity' => $productQuantity, 'unit' => $productUnit];

                // On sélectionne le dernier produit et on affiche le prix total
                if ($item === end($basket)) {
                    $totalPriceFormatted = number_format($totalPrice, 2, ',', '') . '€';
                    $basketProduct['totalPrice'] = $totalPriceFormatted;
                }

                // ajout du produit à la chaine json
                // .= opérateur de concaténation

                $json .= json_encode($basketProduct, JSON_UNESCAPED_UNICODE) . ',';
            }

            // suppression de la virgule en trop à la fin de la chaine JSON
            $json = rtrim($json, ',');

        }
        dump($json);
        // encapsulation de la chaine JSON entre des crochets pour créer un tableau JSON valide
        $json = '[' . $json . ']';


        // fin création fichier json

        $command = new Commande;

        // stocker la date de validation du panier
        $date = new DateTimeImmutable();


        // mettre la date au format chaine de caractères pour l'afficher dans la vue
        $newDate = $date->format('d-m-Y');

        if($basket != null) {
            // définir les informations que l'on va envoyer en base de données
            $command->setUser($this->getUser())->getId();
            $command->setCommandProductDate($date);
            $command->setJsonCommand(array($json));


            // stocker en base de données la commande
            $commandeRepository->save($command, true);
        }

        // afficher toutes les commandes sur la vue

        $userCommandes = $commandeRepository->findBy(
            ['user' => $this->getUser()->getId()],
            ['id' => 'DESC']
        );

        if ($basket != null ) {
            $messageConfirmationCommand = "Votre commande a bien été prise en compte! merci de votre confiance";
            $newDate = $date->format('d-m-Y');
            $summaryOrderTitle = "Récapitulatif de votre commande";

            $userDerniereCommande = $userCommandes[0];
            $commandeData = json_decode($userDerniereCommande->getJsonCommand()[0]);
            $totalPriceOrder = "prix total:";
            $dateOrder = "commande effectuée le:";
            $totalPrice = number_format($totalPrice, 2, ',', '') . '€';

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
        $session->remove('Basket');

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

    #[Route('/commands/', name: 'app_commands')]
    public function displayAllCommands(CommandeRepository $commandeRepository): Response
    {

        // afficher toutes les commandes sur la vue

        $userCommandes = $commandeRepository->findBy(
            ['user' => $this->getUser()->getId()],
            ['id' => 'DESC'],

        );
        return $this->render("commands/commands.html.twig", [
            'controller_name' => 'CommandeController',
            'userCommandes' => $userCommandes,

        ]);

    }
}




















