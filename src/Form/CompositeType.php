<?php

namespace App\Form;

use App\Entity\Composite\Component;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompositeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('group', ChoiceType::class, [
            'label'=>"Number group classes",
            'mapped' => false,
            'choices' => $this->choicesGroup(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('min', ChoiceType::class, [
            'label'=>"Minimum number of children",
            'mapped' => false,
            'choices' => $this->choicesMin(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('max', ChoiceType::class, [
            'label'=>"Maximum number of children",
            'mapped' => false,
            'choices' => $this->choicesMax(),
            'attr' => ['class' => 'form-control'
        ]
        ])
        ->add('exams', ChoiceType::class, [
            'label'=>"Number of exams",
            'mapped' => false,
            'choices' => $this->choicesExams(),
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

    private function choicesGroup(){
        $number = Component::CLASSES;
        $output = [];
        for($i=1; $i<sizeof($number)+1; $i++){
            $output[$i] = $i;
        }

        return $output;
    }

    private function choicesMin(){
        $number = 15;
        $output = [];
        for($i=10; $i<$number+1; $i++){
            $output[$i] = $i;
        }

        return $output;
    }

    private function choicesMax(){
        $number = 25;
        $output = [];
        for($i=20; $i<$number+1; $i++){
            $output[$i] = $i;
        }

        return $output;
    }

    private function choicesExams(){
        $number = 4;
        $output = [];
        for($i=1; $i<$number+1; $i++){
            $output[$i] = $i;
        }

        return $output;
    }
}
