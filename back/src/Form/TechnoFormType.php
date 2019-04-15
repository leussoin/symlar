<?php

namespace App\Form;

use App\Entity\Techno;
use App\Entity\TechDomain;
use Doctrine\ORM\EntityRepository;
use App\Repository\TechDomainRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechnoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('domain', EntityType::class, [
                'class' => TechDomain::class,
                'placeholder' => 'Domaine de compétence',
                'required' => true,
                'query_builder' => function(EntityRepository $er) {
                    return TechDomainRepository::orderByName($er);

                },
            ])
        ;

        $builder->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
            'attr' => [
                'class' => 'btn btn-primary action-save',
            ],
        ] );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techno::class,
        ]);
    }
}
