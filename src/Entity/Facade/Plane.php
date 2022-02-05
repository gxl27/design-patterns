<?php

namespace App\Entity\Facade;

use App\Entity\Facade\Engine;

class Plane {

    // this it's the facade
    public $engine;

    public $type;
    public $route;

    public function __construct(Engine $facade)
    {
        $this->engine = $facade;
        $this->type = "Boeing 737 MAX";
        $this->route = "Paris -> Bucharest";

    }

    public function getEngine()
    {
        return $this->engine;

    }

    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;

        return $this;
    }


    public function getType()
    {
        return $this->type;

    }

    public function getRoute()
    {
        return $this->route;
        
    }

}