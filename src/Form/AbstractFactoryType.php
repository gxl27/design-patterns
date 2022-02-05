<?php

namespace App\Form;

use App\Entity\AbstractFactory\AbstractFactory;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbstractFactoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('factory', ChoiceType::class, [
            'label'=>"Factory",
            'mapped' => false,
            'choices' => $this->choicesFactory(),
            'attr' => [
        ]
        ])

        ->add('product', ChoiceType::class, [
            'label'=>"Product",
            'mapped' => false,
            'choices' => $this->choicesType(),
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

    private function choicesType(){
        $choices = AbstractFactory::VEHICLES;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }

    private function choicesFactory(){
        $choices = AbstractFactory::FACTORIES;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }
}
