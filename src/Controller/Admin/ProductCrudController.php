<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            IdField::new('id')
                ->setFormTypeOption('disabled', true),

            TextField::new('product_name'),

            ImageField::new('product_image')
                ->setBasePath('uploads/images/')
                ->setUploadDir('assets/images/'),

            NumberField::new('product_price'),
            NumberField::new('product_stock'),
            TextField::new('product_description'),
            ChoiceField::new('product_category')->setChoices([
                'légume' => "légume",
                'fruit' => 'fruit',
                'fruit exotique' => 'fruit exotique',
                'panier' => 'panier',
            ]),
            TextField::new('product_advice'),

            AssociationField::new('unit'),
        ];
    }

}
