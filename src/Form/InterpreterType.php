<?php

namespace App\Form;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class InterpreterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('amount', IntegerType::class, [
            'label'=>"input value",
            'mapped' => false,
            'attr' => ['class' => 'form-control',
                        'type' => 'number',
                        'min' => '0'
        ]
        ])

        ->add('type', ChoiceType::class, [
            'label'=>"select convertor",
            'mapped' => false,
            'choices' => $this->choicesType(),
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

    private function choicesType(){
        $choices = [0 => 'litres to gallons',
                    1 => 'gallons to litres',
                    2 => 'km to miles',
                    3 => 'miles to km',
                    4 => 'litres / 100 km',
                    5 => 'gallons / 100 miles'];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
