<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileUserController extends AbstractController
{
    #[Route('/profil/user', name: 'profile_user')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->displayArticlesByCategory(['fruit', 'légume', 'panier']);

        return $this->render('home/home.html.twig', [
            'controller_name' => 'ProfileUserController',
            'products' =>  $products,

        ]);
    }
    #[Route('/profil/user/{id}', name: 'profile_user_show')]
    public function showProfile(UserRepository $userRepository, $id, CommandeRepository $commandeRepository): Response
    {

//        if (!$this->isGranted('ROLE_USER')) {
//            return $this->redirectToRoute('app_home');
//        }

        $userProfil = $userRepository-> find($id);
        $totalProductsPrice = $commandeRepository->findAll();

        return $this->render('profil_user/profil_user.html.twig', [
            'controller_name' => 'ProfileUserController',
            'userProfil' => $userProfil,
            'totalProductsPrice' => $totalProductsPrice

        ]);
    }
}




