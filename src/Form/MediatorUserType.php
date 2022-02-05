<?php

namespace App\Form;

use App\Entity\Mediator\User;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MediatorUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        // ->add('name', HiddenType::class, [
        //     'mapped' => true,
        //     'attr' => ['class' => 'form-control',
        // ]
        // ])
        ->add('message', TextareaType::class, [
            'label'=>false,
            'mapped' => false,
            'required' => false,
            'attr' => ['class' => 'form-control',
                        'placeholder' => 'Write a message to all users ...'
        ]
        ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => false
        ]);
    }

}
