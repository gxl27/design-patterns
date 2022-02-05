<?php

namespace App\Form;


use App\Form\MediatorUserType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MediatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('users', CollectionType::class,[
            'entry_type' => MediatorUserType::class,
            'entry_options' => ['label' => false],
            'label' => false,
            'by_reference' => false,
            'allow_add' => false,
            'allow_delete' => false,

        ]) 

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([

            'csrf_protection' => false
        ]);
    }

}
