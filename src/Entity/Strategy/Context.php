<?php

namespace App\Entity\Strategy;

use App\Entity\Strategy\StrategyInterface;

class Context {

    public $strategy;
    public $city;


    public function __construct($city)
    {
        $this->city = $city;  
        // set strategy 
        $this->setStrategy();
    }


    //for runtime
    public function setCity($city){

        $this->city = $city;
        $this->setStrategy();

    }



    //for runtime
    public function setStrategy(){

        // create new concrete strategy from the selected input
        $classname = "App\Entity\Strategy\\"  .ucfirst($this->city->getTypeFormated());
        $this->strategy =  new $classname();

    }



    public function execute(){

        // execute the concrete strategy
        return $this->strategy->dispayInfo($this->city);
    }

}