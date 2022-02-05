<?php

namespace App\Form;

use App\Entity\Factory\Creator;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactoryVehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('vehicle', ChoiceType::class, [
            'label'=>"Vehicle",
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
        $choices = Creator::VEHICLES;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }
}
