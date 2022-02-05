<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class VisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        // ->add('message', TextareaType::class, [
        //     'label'=>"Notification message",
        //     'mapped' => false,
        //     'attr' => ['class' => 'form-control',
        // ]
        // ])
        ->add('tv', CollectionType::class,[
            'entry_type' => VisitorProductType::class,
            'entry_options' => ['label' => false],
            'label' => 'TV\'s',
            'by_reference' => false,
            'allow_add' => false,
            'allow_delete' => false,

        ]) 
        ->add('laptop', CollectionType::class,[
            'entry_type' => VisitorProductType::class,
            'entry_options' => ['label' => false],
            'label' => 'laptops',
            'by_reference' => false,
            'allow_add' => false,
            'allow_delete' => false,

        ]) 
        ->add('fridge', CollectionType::class,[
            'entry_type' => VisitorProductType::class,
            'entry_options' => ['label' => false],
            'label' => 'fridges',
            'by_reference' => false,
            'allow_add' => false,
            'allow_delete' => false,

        ]) 
        ->add('air', CollectionType::class,[
            'entry_type' => VisitorProductType::class,
            'entry_options' => ['label' => false],
            'label' => 'air conditioners',
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
