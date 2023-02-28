<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;



class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

   
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('password')->setPermission("ROLE_SUPER_ADMIN"),
            ArrayField::new('roles'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityPermission('ROLE_ADMIN')
            // ...
        ;
    }

    // /**
    //  * @Route("/checkToken", name="checkToken")
    //  */
    
    // public function test(Request $request,ProductRepository $pd  ){
        
    //     dd("ok12");
    //     // return $this->redirect("/list_produit");
    // }
    
    
    
}
