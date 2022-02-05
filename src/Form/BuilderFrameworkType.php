<?php

namespace App\Form;

use App\Entity\Builder\AbstractFrameworkBuilder;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuilderFrameworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('framework', ChoiceType::class, [
            'label'=>"Application",
            'mapped' => false,
            'choices' => $this->choicesFramework(),
            'attr' => ['class' => 'form-control'
        ]
        ])

        ->add('details', ChoiceType::class, [
            'label'=>"Detalied",
            'mapped' => false,
            'choices' => $this->choicesDetails(),
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

    private function choicesFramework(){
        $choices = AbstractFrameworkBuilder::WEBSITES;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }

    private function choicesDetails(){
        $choices = [0 => 'No', 1 => 'Yes'];
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
