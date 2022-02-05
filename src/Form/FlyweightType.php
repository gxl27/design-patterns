<?php

namespace App\Form;

use App\Entity\Flyweight\MapGenerator;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlyweightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('size', ChoiceType::class, [
            'label'=>"Map size",
            'mapped' => false,
            'choices' => $this->choicesSize(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('towns', ChoiceType::class, [
            'label'=>"Number of towns",
            'mapped' => false,
            'choices' => $this->choicesTowns(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('density', ChoiceType::class, [
            'label'=>"Density",
            'mapped' => false,
            'choices' => $this->choicesDensity(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('guards', ChoiceType::class, [
            'label'=>"Guards level",
            'mapped' => false,
            'choices' => $this->choicesGuards(),
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

    private function choicesSize(){
        $choices = MapGenerator::SIZE;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesTowns(){
        $choices = [1 => 1, 2 => 2, 3 => 3, 4 => 4];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesDensity(){
        $choices = MapGenerator::DENSITY;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesGuards(){
        $choices = MapGenerator::GUARDS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
