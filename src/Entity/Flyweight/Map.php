<?php

namespace App\Entity\Flyweight;



class Map {

    public $map;
    public $size;
    public $towns;
    public $density;
    public $guards;

    public function getMap(){

        return $this->map;

    }

    public function setMap(MapGenerator $map){

        $this->map = $map;
        
    }

    public function getSize(){

        return $this->size;

    }

    public function setSize($size){

        $this->size = $size;
        
    }

    public function getTowns(){

        return $this->towns;

    }

    public function setTowns($towns){

        $this->towns = $towns;
        
    }

    public function getDensity(){

        return $this->density;

    }

    public function setDensity($density){

        $this->density = $density;
        
    }

    public function getGuards(){

        return $this->guards;

    }

    public function setGuards($guards){

        $this->guards = $guards;
        
    }



    public function generate(int $x, int $y)
    {
        $map = array_fill(0, $x, ['status' => false, 'object'=> 0]);

        $this->map = $map;

        // $vehicleName = "App\Entity\Factory\\"  .ucfirst($option);
        // $this->vehicle =  new $vehicleName();
        
    }
    
}