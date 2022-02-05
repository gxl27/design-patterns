<?php

namespace App\Form;

use App\Entity\Strategy\City;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StrategyCityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('city', ChoiceType::class, [
            'label'=>"Destination",

            'choices' => $this->choicesDestination(),
            'attr' => ['class' => 'form-control'
        ]
        ])

        ->add('type', ChoiceType::class, [
            'label'=>"Travel by/with",

            'choices' => $this->choicesType(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => City::class,
            'csrf_protection' => false
        ]);
    }

    private function choicesType(){
        $choices = City::TYPE;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesDestination(){
        $choices = City::CITY;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
