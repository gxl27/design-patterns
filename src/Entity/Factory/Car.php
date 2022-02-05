<?php

namespace App\Entity\Factory;

use App\Entity\Factory\Vehicle;

class Car implements Vehicle {

    public function calculate()
    {
        $result = 'Average speed 80 km/h';

        return $result;
    }

}