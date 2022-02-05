<?php

namespace App\Form;

use App\Entity\Singleton\SingletonGlobalConfig;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SingletonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('number', IntegerType::class, [
            'label'=>"config number",
            'mapped' => false,
            'attr' => ['class' => 'form-control',
                        'type' => 'number',
                        'min' => '0'
        ]
        ])

        ->add('color', ChoiceType::class, [
            'label'=>"select color",
            'mapped' => false,
            'choices' => $this->choicesColor(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('type', ChoiceType::class, [
            'label'=>'action',
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
        $choices = [0 => 'change config', 1 => 'new config'];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesColor(){
        $choices = ['blue', 'red', 'green', 'black'];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }
}
