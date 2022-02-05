<?php

namespace App\Form;

use App\Entity\Visitor\ProductInterface;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class VisitorProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

       
        ->add('quantity', IntegerType::class, [
            'label'=> false,
            'mapped' => true,
            'required' => false,
            'attr' => ['class' => 'form-control',
                        'type' => 'number',
                        'min' => '0'

        ]
        ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductInterface::class,
            'csrf_protection' => false
        ]);
    }

}
