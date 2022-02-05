<?php

namespace App\Form;

use App\Entity\Facade\OilSensor;
use App\Entity\Facade\FuelSensor;
use App\Entity\Facade\TemperatureSensor;
use App\Entity\Facade\FlapsSensor;
use App\Entity\Facade\LandingGear;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacadeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('oil', ChoiceType::class, [
            'label'=>"Oil presure (bars)",
            'mapped' => false,
            'choices' => $this->choicesOil(),
            'attr' => [
        ]
        ])
        ->add('fuel', ChoiceType::class, [
            'label'=>"Fuel level (l)",
            'mapped' => false,
            'choices' => $this->choicesFuel(),
            'attr' => [
        ]
        ])
        ->add('temperature', ChoiceType::class, [
            'label'=>"Temperature (°C)",
            'mapped' => false,
            'choices' => $this->choicesTemperature(),
            'attr' => [
        ]
        ])
        ->add('flaps', ChoiceType::class, [
            'label'=>"Flaps position",
            'mapped' => false,
            'choices' => $this->choicesFlaps(),
            'attr' => [
        ]
        ])
        ->add('landingGear', ChoiceType::class, [
            'label'=>"Landing gear position",
            'mapped' => false,
            'choices' => $this->choicesLandingGear(),
            'attr' => [
        ]
        ])
        ->add('type', Hiddentype::class, [

            'mapped' => false,
            'attr' => ['id' => 'hideinput'
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

    private function choicesOil(){
        $choices = OilSensor::LIMITS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }

    private function choicesFuel(){
        $choices = FuelSensor::LIMITS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }

    private function choicesTemperature(){
        $choices = TemperatureSensor::LIMITS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }

    private function choicesFlaps(){
        $choices = FlapsSensor::LIMITS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }

    private function choicesLandingGear(){
        $choices = LandingGear::LIMITS;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $v;
        }
        return $output;
    }
}
