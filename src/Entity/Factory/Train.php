<?php

namespace App\Entity\Factory;

use App\Entity\Factory\Vehicle;

class Train implements Vehicle {

    public function calculate()
    {
        $result = 'Average speed 120 km/h';

        return $result;
    }

}