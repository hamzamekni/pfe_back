<?php

namespace App\Controller\Admin;

use App\Entity\Livraison;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class LivraisonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livraison::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('etat_livraison'),
            DateField::new('date_livraison'),
            NumberField::new('prix_livraison'),

        ];
    }
    
}
