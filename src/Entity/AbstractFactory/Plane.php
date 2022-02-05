<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\VehicleInterface;

class Plane implements VehicleInterface {

    public function calculate()
    {
        $result = 'Average speed 900 km/h';

        return $result;
    }

}