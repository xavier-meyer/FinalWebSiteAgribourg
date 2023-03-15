<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;


class CommandeCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setFormTypeOption('disabled', true),

            AssociationField::new('user'),

            DateTimeField::new('commandProductDate'),

            ArrayField::new('json_command')

        ];
    }

}

//        $form = $this->createFormBuilder();
//          $Commande->getUser()
//            ->add('user', EntityType::class, [
//                'class' => 'App\Entity\User',
//                'choice_label' => $user,
//            ])
//            ->getForm();
//
//        return [
//            $form->createView()
//        ];

