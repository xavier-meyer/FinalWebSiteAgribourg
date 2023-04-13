<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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

            ChoiceField::new('commandProductStatus')->setChoices([
            'En cours de préparation' => 'En cours de préparation',
            'En cours de livraison' => 'En cours de livraison',
            'Livrée' => 'Livrée',
            ]),

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

