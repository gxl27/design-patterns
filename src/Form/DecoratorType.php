<?php

namespace App\Form;

use App\Entity\Decorator\AbstractDecorator;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecoratorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('game', ChoiceType::class, [
            'label'=>"Game",
            'mapped' => false,
            'choices' => $this->choicesGames(),
            'attr' => ['class' => 'form-control'
        ]
        ])

        ->add('type', ChoiceType::class, [
            'label'=>"Device",
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
        $choices = AbstractDecorator::TYPE;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesGames(){
        $choices = AbstractDecorator::GAMES;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
