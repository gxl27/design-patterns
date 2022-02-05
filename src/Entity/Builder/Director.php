<?php

namespace App\Entity\Builder;

use App\Entity\Builder\AbstractFrameworkBuilder;

class Director{

    public $builder;

    public function __construct(int $id)
    {
        $this->setBuilder($id);
        
    }

    public function setBuilder(int $id){

        $frameworkName = AbstractFrameworkBuilder::FRAMEWORKS[$id];
        $frameworkName = "App\Entity\Builder\\"  .ucfirst($frameworkName)."Framework";
        $this->builder =  new $frameworkName();
      
    }

    public function getBuilder(){

        return $this->builder;

    }

    public function build(int $id) {

        switch ($id) {
            case 1 :
                $this->builder->detaliedBuild();
                break;
            default : $this->builder->simpleBuild();
        }

        return $this->builder->build();

    }

    public function reset() {
        
        return $this->builder->reset();

    }
     
}