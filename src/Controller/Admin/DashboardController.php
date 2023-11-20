<?php

namespace App\Controller\Admin;

use App\Entity\Lieu;
use App\Entity\Site;
use App\Entity\Sortie;
use App\Entity\User;
use App\Entity\Ville;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Site Sortir Com');
    }

    public function configureMenuItems(): iterable
    {
        return [MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),

            MenuItem::section('Lieux'),
            MenuItem::linkToCrud('Lieux', 'fa fa-solid fa-map', Lieu::class),

            MenuItem::section('Sites'),
            MenuItem::linkToCrud('Sites', 'fa fa-solid fa-tree', Site::class),

            MenuItem::section('Sorties'),
            MenuItem::linkToCrud('Sorties', 'fa fa-solid fa-plane', Sortie::class),

            MenuItem::section('Villes'),
            MenuItem::linkToCrud('Villes', 'fa fa-solid fa-city', Ville::class),

            MenuItem::section('Sortie'),
            MenuItem::linkToRoute('Quitter', 'fa fa-home', 'app_sortie_index')
        ];



       // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
