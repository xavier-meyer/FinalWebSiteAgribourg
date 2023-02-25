<?php

namespace App\Controller\Admin;

use App\Entity\Unit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UnitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Unit::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
