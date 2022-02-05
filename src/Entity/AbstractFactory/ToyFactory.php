<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\AbstractFactory;
use App\Entity\AbstractFactory\ToyCar;
use App\Entity\AbstractFactory\ToyPlane;
use App\Entity\AbstractFactory\ToyTrain;


class ToyFactory extends AbstractFactory {

    public function createProduct(string $option)
    {
        $toyName = "App\Entity\AbstractFactory\\Toy"  .ucfirst($option);
        $this->product =  new $toyName();
        
    }

    public function display(){
        
        $result = $this->product->getPrice();

        return $result;
    }

}