<?php

namespace App\Entity\Strategy;

use App\Entity\Strategy\City;

class Foot implements StrategyInterface {

    public $speed = 4;

    public function dispayInfo(City $city) {
        $distance = $city->getDistanceFormated();
        $time = $distance / $this->speed;
        $foot = $distance * 800;

        $response = "Distance $distance km | Average time $time hours ($this->speed km/h) | Steps $foot";

        return $response;
    }
}