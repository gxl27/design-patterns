<?php

namespace App\Form;

use App\Entity\Bridge\AbstractCar;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BridgeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('car', ChoiceType::class, [
            'label'=>"Vehicle",
            'mapped' => false,
            'choices' => $this->choicesCar(),
            'attr' => [
        ]
        ])
        ->add('engine', ChoiceType::class, [
            'label'=>"Engine",
            'mapped' => false,
            'choices' => $this->choicesEngine(),
            'attr' => [
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

    private function choicesCar(){
        $choices = AbstractCar::CARS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }

    private function choicesEngine(){
        $choices = AbstractCar::ENGINES;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }
}
