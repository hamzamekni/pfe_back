<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProductRepository;
use Symfony\Component\Validator\Constraints as Assert;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('NameProduct'),
            ImageField::new('image')
            ->setBasePath($this->getParameter("app.path.product_images"))
            ->onlyOnIndex(),
            NumberField::new('TVA'),
            NumberField::new('prix_progduit'),
            TextField::new('description'),
            TextareaField::new('imageFile','Product image')
            ->setFormType(VichImageType::class)
            ->hideOnIndex()
            ->setFormTypeOption('allow_delete',false),
            BooleanField::new('status'),
            AssociationField::new('idCategory','Type Product'),
            AssociationField::new('idLigne','Ligne Commade'),
            AssociationField::new('idStock','Stock'),
        ];
    }

    // /**
    //  * @Route("/test", name="test")
    //  */
    
    // public function test(Request $request,ProductRepository $pd  ){
    //     $directory = 'E:\formation\public\uploads\images\products';
    //     $imgtest= $this->file('E:\formation\public\test.jpeg') ;
    //    // $imgtest->file->realPath='E:\formation\public\uploads\images\products\test.jpeg';
    //     // $image = $request->file.get("image");
    //     $image_name = "download.jpeg";
    //     //$uploadedFile = $imgtest->get('archivo');
    //    // move('E:\formation\public\test.jpeg','E:\formation\public\uploads\images\products\test.jpeg');
    //     //$imgtest->move($this->getParameter("product_images"),$imgtest);
    //     dd("ok12");
    //     $product = new Product();
    //     $product->setDescription("azekgezrhjkgezhjkg");
    //     $product->setTva("123456");
    //     $product->setPrixProgduit("123");
    //     $product->setStatus(true);
    //     $product->setImage("test.jpeg");
    //     $product->setNameProduct("aezeraaz");
    //    // $product->setImageFile($imgtest);
    //     $pd->add($product);
    //     dd("Ok");
    //     return $this->redirect("/list_produit");
    // }

    // /**
    //  * @Route("/checkToken", methods={"GET"})
    //  */
    
    // public function test(Request $request,ProductRepository $pd  ){
        
    //     dd($request);
    //     return $request;
    //     // return $this->redirect("/list_produit");
    // }

    /**
     * @Route("/api/checkToken/{token}", methods={"GET","HEAD"})
     */
    public function show(String $token): Response
    {
        // check jwt token, return 1 if valid, 0 if not
        return new Response(
            1
        );
    }
    
    
}
