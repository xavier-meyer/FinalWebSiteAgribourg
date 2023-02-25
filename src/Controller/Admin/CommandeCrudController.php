<?php

namespace App\Controller\Admin;


use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

}
//    public function configureFields(string $pageName): iterable
//    {
//
//
////        $form = $this->createFormBuilder();
////          $Commande->getUser()
////            ->add('user', EntityType::class, [
////                'class' => 'App\Entity\User',
////                'choice_label' => $user,
////            ])
////            ->getForm();
////
////        return [
////            $form->createView()
////        ];
//    }
//
//}
