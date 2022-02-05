<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\AbstractFactory;
use App\Entity\AbstractFactory\Car;
use App\Entity\AbstractFactory\Plane;
use App\Entity\AbstractFactory\Train;


class VehicleFactory extends AbstractFactory {

    public function createProduct(string $option)
    {
        $vehicleName = "App\Entity\AbstractFactory\\"  .ucfirst($option);
        $this->product =  new $vehicleName();
        
    }

    public function display(){
        
        $result = $this->product->calculate();

        return $result;
    }
    
}