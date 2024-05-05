<?php

namespace App\Controller\Admin;

use App\Entity\Comments;
use App\Entity\Game;
use App\Entity\Gamenight;
use App\Entity\GamenightParticipant;
use App\Entity\GamenightSnacks;
use App\Entity\GamenightTags;
use App\Entity\Rating;
use App\Entity\Tags;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use phpDocumentor\Reflection\DocBlock\Tag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

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
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Game Night Buddy');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Games', 'fas fa-list', Game::class);
        yield MenuItem::linkToCrud('Game nights', 'fas fa-list', Gamenight::class);
        yield MenuItem::linkToCrud('Game night Tags', 'fas fa-list', GamenightTags::class);
        yield MenuItem::linkToCrud('Game night Participant', 'fas fa-list', GamenightParticipant::class);
        yield MenuItem::linkToCrud('Game night Snacks', 'fas fa-list', GamenightSnacks::class);
        yield MenuItem::linkToCrud('Comments', 'fas fa-list', Comments::class);
        yield MenuItem::linkToCrud('Ratings', 'fas fa-list', Rating::class);
        yield MenuItem::linkToCrud('Tags', 'fas fa-list', Tags::class);
        yield MenuItem::linkToRoute('Website', 'fas fa-list', 'app_home');
    }
}
