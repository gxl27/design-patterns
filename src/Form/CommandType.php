<?php

namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CommandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        // should be a model with constaints (positive amount)
        // should have constraints for js disabled;
        ->add('ballance', IntegerType::class, [
            'label'=>"Amount",
            'mapped' => false,
            'attr' => ['class' => '',
                        'type' => 'number',
                        'min' => '0'
        ]
        ])
        ->add('games', CollectionType::class,[
            'entry_type' => CommandGameType::class,
            'entry_options' => ['label' => false],
            'label' =>false,
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
