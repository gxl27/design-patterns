<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\AbstractCar;

class Mercedes extends AbstractCar{

    // rafined AbstractVehicleBridge

    public function description(){

        $result = "This is a Mercedes car. <br>";
        $result .= $this->engine->start() . "<br>";
        $result .= $this->engine->energy() . "<br>";

        return $result;
    }

}