<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\VehicleInterface;

class Train implements VehicleInterface {

    public function calculate()
    {
        $result = 'Average speed 120 km/h';

        return $result;
    }

}