<?php

namespace App\Form;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IteratorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('words', TextareaType::class, [
            'label'=>false,
            'mapped' => false,
            'label' => "text",
            'attr' => ['class' => 'form-control',
            'placeholder' => "Write text to be filtred ...",
        ]
        ])
        ->add('filter', IntegerType::class, [
            'label'=> 'filter (min number of letters)',
            'mapped' => false,
            'required' => false,
            'attr' => ['class' => 'form-control',
                        'type' => 'number',
                        'min' => '0'

        ]
        ])

        ->add('order', ChoiceType::class, [
            'label'=>"order",

            'choices' => $this->choicesOrder(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => false
        ]);
    }

    private function choicesOrder(){
        $choices = [0 => 'normal', 1 => 'reverse'];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

}
