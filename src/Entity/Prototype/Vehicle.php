<?php

namespace App\Entity\Prototype;

class Vehicle{

    const VEHICLES = [
        0 => 'Car',
        1 => 'Plane',
        2 => 'Train'
    ];

    public $vehicle;
    public $date;

    public function __construct($type)
    {

        $this->vehicle = SELF::VEHICLES[$type];
        $this->date = new \DateTime();
        $this->type = "Original";

    }

    public function __clone() {

        sleep(2);

        $this->type = "Copy of ";
        $this->date = new \DateTime();

    }

    public function getDate(){

        $result = "Created at: " . $this->date->format('d-m-Y h:i:s');

        return $result;

    }

    public function getResult(){

        $result = $this->type ." ". $this->vehicle . " ". $this->getDate();

        return $result;
    }
    
}