<?php

namespace App\Entity\Strategy;

class City {

    const CITY = [
        0 => 'Berlin',
        1 => 'Bucharest',
        2 => 'Rome',
        3 => 'Madrid',
    ];

    const DISTANCE = [
        0 => 878,
        1 => 1871,
        2 => 1107,
        3 => 1052,
    ];

    const TYPE = [
        0 => 'car',
        1 => 'plane',
        2 => 'foot'
    ];

    public $city;

    public $type;

    public function __construct()
    {
        $this->city = 0;
        $this->type = 0;
    }


    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    public function getCityFormated()
    {
        return Self::CITY[$this->city];
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getDistanceFormated()
    {
        return Self::DISTANCE[$this->city];
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    public function getTypeFormated()
    {
        return Self::TYPE[$this->type];
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}