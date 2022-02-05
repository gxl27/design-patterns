<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\AbstractCar;

class Ford extends AbstractCar{

    // rafined AbstractVehicleBridge

    public function description(){

        $result = "This it's a Ford car. <br>";
        $result .= $this->engine->start() . "<br>";
        $result .= $this->engine->energy() . "<br>";

        return $result;
    }

}