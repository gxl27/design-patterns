<?php

namespace App\Entity\Strategy;

use App\Entity\Strategy\City;

class Plane implements StrategyInterface {

    public $speed = 800;

    public function dispayInfo(City $city) {
        $distance = $city->getDistanceFormated();
        $time = round($distance / $this->speed,2);

        $response = "Distance $distance km | Average time $time hours ($this->speed km/h)";
  
        return $response;
    }
}