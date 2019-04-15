<?php

namespace App\Form;

use App\Entity\TechDomain;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TechDomainFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
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
            'data_class' => TechDomain::class,
        ]);
    }
}
