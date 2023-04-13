<?php

namespace App\Controller\Admin;

use App\Entity\HistoriqueEntreprise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HistoriqueEntrepriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HistoriqueEntreprise::class;
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
