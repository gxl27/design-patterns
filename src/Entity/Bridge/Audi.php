<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\AbstractCar;

class Audi extends AbstractCar{

    // rafined AbstractVehicleBridge

    public function description(){

        $result = "This it's a Audi car. <br>";
        $result .= $this->engine->start() . "<br>";
        $result .= $this->engine->energy() . "<br>";

        return $result;
    }

}