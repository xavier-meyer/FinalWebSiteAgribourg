<?php

namespace App\Controller;

use App\Repository\HistoriqueEntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyHistoryController extends AbstractController
{
    #[Route('/company/history', name: 'app_company_history')]
    public function index(HistoriqueEntrepriseRepository $historiqueEntrepriseRepository): Response
    {
        $historiqueEntreprise = $historiqueEntrepriseRepository->findAll();

        return $this->render('company_history/company_history.html.twig', [
            'controller_name' => 'CompanyHistoryController',
            'histoireEntreprise' =>  $historiqueEntreprise,
        ]);
    }
}
