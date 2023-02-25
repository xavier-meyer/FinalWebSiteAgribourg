<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use App\Entity\Product;
use App\Entity\Unit;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    #[Route("/admin", name: "app_admin")]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(ProductCrudController::class)->generateUrl());
    }

//        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FinalWebSiteAgribourg');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Product');
        yield MenuItem::linkToCrud('Product', 'fas fa-list', Product::class)
        ->setController(ProductCrudController::class);
        yield MenuItem::section('User');
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class)
            ->setController(UserCrudController::class);
        yield MenuItem::section('Command');
        yield MenuItem::linkToCrud('Command', 'fas fa-list', Commande::class)
            ->setController(CommandeCrudController::class);
        yield MenuItem::section('Unit');
        yield MenuItem::linkToCrud('Unit', 'fas fa-list', Unit::class)
            ->setController(UnitCrudController::class);

        yield MenuItem::section('Return');
        yield MenuItem::linkToRoute('return to profil', 'fas fa-home', 'profile_user');
    }
}

