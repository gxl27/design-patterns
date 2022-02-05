<?php

namespace App\Entity\Adapter;

class Car implements CarInterface{

    public $type;

    public function __construct()
    {
        $this->type = "car";
    }

    public function drive() {

        $result = "You can drive very fast with this $this->type!";

        return $result;
        
    }

}