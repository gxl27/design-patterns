<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\AbstractCar;

class Mazda extends AbstractCar{

    // rafined AbstractVehicleBridge

    public function description(){

        $result = "This is a Mazda car. <br>";
        $result .= $this->engine->start() . "<br>";
        $result .= $this->engine->energy() . "<br>";

        return $result;
    }

}