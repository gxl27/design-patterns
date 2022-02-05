<?php

namespace App\Form;

use App\Entity\Template\AbstractMenu;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('menu', ChoiceType::class, [
            'label'=>"Choose menu",
            'mapped' => false,
            'choices' => $this->choicesMenu(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('drink', ChoiceType::class, [
            'label'=>"Choose drink",
            'mapped' => false,
            'choices' => $this->choicesDrink(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('delivery', ChoiceType::class, [
            'label'=>'Location',
            'mapped' => false,
            'choices' => $this->choicesDelivery(),
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

    private function choicesMenu(){
        $choices = AbstractMenu::MENU;
        $output = [];

        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesDrink(){
        $choices = AbstractMenu::DRINKS;
        $output = [];

        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesDelivery(){
        $choices = AbstractMenu::DELIVERY;
        $output = [];

        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
    
}
