<?php

namespace App\Form;

use App\Entity\Command\Game;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CommandGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        // ->add('team1', TextType::class, [
        //     'label'=> false,
        //     'mapped' => true,
        //     'required' => false,
        //     'attr' => ['class' => 'form-control',
        //                 'type' => 'number',
        //                 'min' => '0'

        //     ]
        // ])
        // ->add('team2', TextType::class, [
        //     'label'=> false,
        //     'mapped' => true,
        //     'required' => false,
        //     'attr' => ['class' => 'form-control',
        //                 'type' => 'number',
        //                 'min' => '0'

        //     ]
        // ])
        // ->add('bet1', IntegerType::class, [
        //     'label'=> false,
        //     'mapped' => true,
        //     'required' => false,
        //     'attr' => ['class' => 'form-control',
        //                 'type' => 'number',
        //                 'min' => '0'

        //     ]
        // ])
        // ->add('bet2', IntegerType::class, [
        //     'label'=> false,
        //     'mapped' => true,
        //     'required' => false,
        //     'attr' => ['class' => 'form-control',
        //                 'type' => 'number',
        //                 'min' => '0'

        //     ]
        // ])
        ->add('marked1', HiddenType::class, [
            'label'=> false,
            'mapped' => true,
            'required' => true,

        ])
        ->add('marked2', HiddenType::class, [
            'label'=> false,
            'mapped' => true,
            'required' => true,

        ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
            'csrf_protection' => false
        ]);
    }

}
