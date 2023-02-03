<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un prenom',
                    ]),
                    new Length([
                    'min' => 3,
                    'minMessage' => 'Votre prenom doit comporter au moins {{ limit }} charactéres',
                        // max length allowed by Symfony for security reasons
                    'max' => 17,
                    'maxMessage' => 'Votre prenom doit comporter au maximum {{ limit }} charactéres',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le prénom ne peut contenir que des lettres.',
                    ])
                ],
            ])

            ->add('nom', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un nom',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom doit comporter au moins {{ limit }} charactéres',
                        'max' => 12,
                        'maxMessage' => 'Votre mot de passe doit comporter au maximum {{ limit }} charactéres',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le nom ne peut contenir que des lettres.'
                    ])
                ],
            ])

            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un email',
                    ])
                ]
            ])

            ->add('telephone', TelType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^(?:\+33|0033|0)\d{9}$/',
                        'message' => "Le numéro de téléphone n'est pas valide.",
                    ]),
                ]
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'entrer un mot de passe',
                    ]),
//                    new Length([
//                        'min' => 6,
//                        'minMessage' => 'Votre mot de passe doit comporter au moins  {{ limit }} charactéres',
//                        // max length allowed by Symfony for security reasons
//                        'max' => 4096,
//                    ]),
                    new Regex ([
                        'pattern' => '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{12,}$/',
                        'message' => "Votre mot de passe doit contenir au moins une majuscule
                        , une minuscule, un chiffre, un caractère spécial et un mimimum de 12 caractères.",
                    ])
                ],
            ])

            ->add('passwordVerification', PasswordType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vérifier votre mot de passe',
                    ]),
//                    new EqualTo([
//                        'propertyPath' => 'getPlainPassword',
//                        'message' => 'Les mots de passe ne correspondent pas.',
//                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ]);

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

