<?php

namespace App\Entity\Factory;


class Creator {

    const VEHICLES = [
        0 => 'Car',
        1 => 'Plane',
        2 => 'Train'
    ];

    public $vehicle;

    public function create(string $option)
    {
        $vehicleName = "App\Entity\Factory\\"  .ucfirst($option);
        $this->vehicle =  new $vehicleName();
        
    }
    
    public function getVehicle(){

        return $this->vehicle;

    }
}