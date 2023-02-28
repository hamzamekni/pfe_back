<?php

namespace App\Controller\Admin;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('label'),
            ColorField::new('color'),
        ];
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
