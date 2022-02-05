<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\VehicleInterface;

class Car implements VehicleInterface {

    public function calculate()
    {
        $result = 'Average speed 80 km/h';

        return $result;
    }

}