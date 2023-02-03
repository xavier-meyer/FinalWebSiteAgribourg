<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileUserController extends AbstractController
{
//    #[Route('/profil/user', name: 'profile_user')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->displayArticlesByCategory([1, 2, 3]);

        return $this->render('home/home.html.twig', [
            'controller_name' => 'ProfileUserController',
            'articles' => $articles,

        ]);
    }
    //    #[Route('/profil/user/{id}', name: 'profile_user_show')]
        public function showProfile(UserRepository $userRepository, $id): Response
        {

            if (!$this->isGranted('ROLE_USER')) {
                return $this->redirectToRoute('app_home');
            }

            $userProfil = $userRepository-> find($id);

            return $this->render('profil_user/profil_user.html.twig', [
                'controller_name' => 'ProfileUserController',
                'userProfil' => $userProfil,
            ]);
        }
}



