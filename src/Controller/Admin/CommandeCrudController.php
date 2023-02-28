<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date_commande'),
            TextField::new('mode_paiment'),
            BooleanField::new('paiment_valide'),
            DateField::new('date_paiment'),
            AssociationField::new('ligneCommandes'),
            AssociationField::new('idLivrivation','Id Livraison'),
            AssociationField::new('Facture'),
        ];
    }
    
}
