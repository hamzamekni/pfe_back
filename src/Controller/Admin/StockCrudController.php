<?php

namespace App\Controller\Admin;

use App\Entity\Stock;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;

class StockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stock::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('id'),
            NumberField::new('quantite_stock'),
            BooleanField::new('status'),
            
            ColorField::new('color'),
        ];
    }
    
}
