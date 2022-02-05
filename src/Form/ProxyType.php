<?php

namespace App\Form;

use App\Entity\Proxy\WebsiteList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProxyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('website', ChoiceType::class, [
            'label'=>"Choose youtube clip",
            'mapped' => false,
            'choices' => $this->choicesWebsite(),
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

    private function choicesWebsite(){
        $list = WebsiteList::LIST;
        $output = [];
       
        
        for($i=0; $i<sizeof($list); $i++){

            $output[$list[$i]['name']] = $i;
        }

        return $output;
    }

    
}
