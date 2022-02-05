<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\EngineInterface;

abstract class AbstractCar {

    const CARS = [
        0 => 'Mazda',
        1 => 'Ford',
        2 => 'Mercedes',
        3 => 'Audi'
    ];

    const ENGINES = [
        0 => 'Diesel',
        1 => 'Hybride',
        3 => 'Electric',
    ];

    public $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function setEngine($engine) {

        $this->engine = $engine;
        
    }

    abstract function description();


}