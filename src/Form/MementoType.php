<?php

namespace App\Form;

use App\Entity\Memento\ConcreteMemento;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MementoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('text', TextareaType::class, [
            'label'=>'text to save',
            'mapped' => false,
            
            'attr' => ['class' => 'form-control',
            'placeholder' => "Write a phrase ...",
        ]
        ])
        ->add('saves', CollectionType::class,[
            'entry_type' => ConcreteMemento::class,
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

    private function choicesSaves(){
        $choices = [0 => 'ascending', 1 => 'descending'];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

}
