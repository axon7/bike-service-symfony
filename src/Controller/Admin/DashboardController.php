<?php

namespace App\Controller\Admin;

use App\Entity\Repair;
use App\Entity\RepairComment;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(RepairCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bike Service');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute( 'Strona główna','fa fa-home', 'app_homepage');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::section('Naprawy');
        yield MenuItem::linkToCrud('Naprawy', 'fas fa-wrench', Repair::class);
        yield MenuItem::linkToCrud('Komentarze', 'fa fa-comment', RepairComment::class);

        yield MenuItem::section('Użytkownicy');
        yield MenuItem::linkToCrud('Użytkownicy', 'fa fa-user', User::class);


    }
}
