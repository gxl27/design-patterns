<?php

namespace App\Form;


use App\Form\ObserverUserType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ObserverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('message', TextareaType::class, [
            'label'=>"Notification message",
            'mapped' => false,
            'attr' => ['class' => 'form-control',
        ]
        ])
        ->add('pc', CollectionType::class,[
            'entry_type' => ObserverUserType::class,
            'entry_options' => ['label' => false],
            'label' => false,
            'by_reference' => false,
            'allow_add' => false,
            'allow_delete' => false,

        ]) 
        ->add('mobile', CollectionType::class,[
            'entry_type' => ObserverUserType::class,
            'entry_options' => ['label' => false],
            'label' => false,
            'by_reference' => false,
            'allow_add' => false,
            'allow_delete' => false,

        ]) 
        ->add('customapp', CollectionType::class,[
            'entry_type' => ObserverUserType::class,
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
