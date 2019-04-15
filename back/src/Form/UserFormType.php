<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Poste;
use App\Entity\Adress;
use App\Entity\UserType;
use Doctrine\ORM\EntityRepository;
use App\Repository\UserTypeRepository;
use App\Repository\PosteRepository;
use App\Repository\AdressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var User $report */
        $user = $builder->getData();

        $builder
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Sexe' => '',
                    'Femme' => 'f',
                    'Homme' => 'm',
                ],
            ])
            ->add('birthdate', BirthdayType::class, [
                'placeholder' => [
                    'year' => 'année',
                    'month' => 'mois',
                    'day' => 'jour'
                ],
                'format' => 'dd / MM / yyyy'
            ])
            ->add('enabled')
            ->add('poste', EntityType::class, [
                'class' => Poste::class,
                'placeholder' => 'Choisissez un poste',
                'required' => true,
                'query_builder' => function(EntityRepository $er) {
                    return PosteRepository::orderByName($er);

                },
            ])
            ->add('usertype', EntityType::class, [
                'class' => UserType::class,
                'placeholder' => 'Choisissez un type d\'utilisateur',
                'required' => true,
                'query_builder' => function(EntityRepository $er) {
                    return UserTypeRepository::orderByName($er);

                },
            ])
            ->add('adress', EntityType::class, [
                'class' => Adress::class,
                'placeholder' => 'Choisissez une adresse',
                'multiple' => true,
                'required' => true,
                'query_builder' => function(EntityRepository $er) {
                    return AdressRepository::orderByCity($er);

                }
            ])
            ->add('newAdress', CollectionType::class, [
                'entry_type' => AdressFormType::class,
                'allow_add' => true,
                // 'prototype' => true,
                'entry_options' => ['label' => false],
                'required' => false,
            ])
        ;
        
        $builder->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
            'attr' => [
                'class' => 'btn btn-primary action-save',
            ],
        ] );

        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {

                /** @var User $user */
                $user = $event->getData();
                /** @var Adress $adressList */
                $adressList = $user->getAdress();

                for($i = 0 ; $i < count($adressList) ; $i++){
                    //set address Customer in place Rdv
                    $adressList[$i]->addUser($user);
                }
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
