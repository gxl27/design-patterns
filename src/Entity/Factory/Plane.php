<?php

namespace App\Entity\Factory;

use App\Entity\Factory\Vehicle;

class Plane implements Vehicle {

    public function calculate()
    {
        $result = 'Average speed 900 km/h';

        return $result;
    }

}