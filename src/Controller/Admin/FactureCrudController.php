<?php

namespace App\Controller\Admin;

use App\Entity\Facture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class FactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date_facture'),
            NumberField::new('prix_total'),
            NumberField::new('num_facture'),    
        ];
    }
    
}
