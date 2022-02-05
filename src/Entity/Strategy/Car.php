<?php

namespace App\Entity\Strategy;

use App\Entity\Strategy\City;

class Car implements StrategyInterface {

    public $speed = 60;

    public function dispayInfo(City $city) {
        $distance = $city->getDistanceFormated();
        $time = round($distance / $this->speed);
        $litres = round(round($distance / 100, 2) * 7);
        $response = "Distance $distance km | Average time $time hours ($this->speed km/h) | Diesel: " . $litres . " l";
        
        return $response;
    }
}