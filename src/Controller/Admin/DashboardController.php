<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\CategoryRepository;
use App\Entity\User;
use App\Entity\Stock;
use App\Entity\Product;
use App\Entity\Livraison;
use App\Entity\LigneCommande;
use App\Entity\Facture;
use App\Entity\Commande;
use App\Entity\Category;
use App\Entity\Calendar;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/{_locale}/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Formation');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        if ($this->isGranted('ROLE_ADMIN')){
            yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        }
        yield MenuItem::linkToCrud('Calendar', 'fas fa-list', Calendar::class);
        yield MenuItem::linkToCrud('Stock', 'fas fa-list', Stock::class);
        yield MenuItem::linkToCrud('Product', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Livraison', 'fas fa-list', Livraison::class);
        yield MenuItem::linkToCrud('LigneCommande', 'fas fa-list', LigneCommande::class);
        yield MenuItem::linkToCrud('Facture', 'fas fa-list', Facture::class);
        yield MenuItem::linkToCrud('Commande', 'fas fa-list', Commande::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
    }

    /**
     * @Route("/{_locale}/stats", name="stats")
     */

    public function statistiques(CategoryRepository $categRepo){

        $categories = $categRepo->findAll();

        $categNom = [];
        $categColor = [];

        // On "démonte" les données pour les séparer tel qu'attendu par ChartJS
        foreach($categories as $category){
            $categNom[] = $category->getLabel();
            $categColor[] = $category->getColor();
            
        }
      



        return $this->render('admin/stats.html.twig', ['categNom' =>json_encode($categNom),'categColor' => json_encode($categColor)]);
    }

    
}
