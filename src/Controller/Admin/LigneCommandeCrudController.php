<?php

namespace App\Controller\Admin;

use App\Entity\LigneCommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
class LigneCommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LigneCommande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('id'),
            AssociationField::new('idCommande'),
            TextField::new('quantiteCommande'),
        ];
    }
    
}
