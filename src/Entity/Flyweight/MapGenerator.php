<?php

namespace App\Entity\Flyweight;


use App\Entity\Flyweight\Map;
use App\Entity\Flyweight\TitleFactory;


class MapGenerator {

    const SIZE = [
        10 => 'Small',
        20 => 'Medium',
        30 => 'Large',
        40 => 'ExtraLarge'
    ];

    const OBJ = [
        0 => 'Terrain',
        1 => 'Town',
        2 => 'Guard',
        3 => 'Obstacle'
    ];

    const DENSITY = [
        20 => 'Low',
        30 => 'Medium',
        40 => 'High'
    ];

    const GUARDS = [
        0 => 'Weak',
        1 => 'Normal',
        2 => 'Strong'
    ];

    const OBSTACLE = [
        "obstacle",'obstacle2'
    ];

    const TOWNS = [
        "castle",'conflux','tower','necropolis'
    ];

    const GUARDLIST = [
        'Weak' => ['airelement', 'archer', 'gremlin','pixie','skeleton','zombie'],
        "Normal" => ['airelement', 'energyelement','genie','griffin','naga','vampire'],
        'Strong' => ['angel', 'archangel', 'bonedragon', 'firebird', 'genie', 'ghostdragon', 'giant', 'naga', 'phoenix', 'titan', 'vampire']
    ];

    public $map;
    public $remainingMap;
    public $size;
    public $towns;
    public $density;
    public $guards;
    public $densityMap;

    public function __construct($size, $towns, $density, $guards)
    {
        $this->size = $size;
        $this->towns = $towns;
        $this->density = $density;
        $this->guards = $guards;
        // set the density of units and obstacle of the map
        $this->setDensityMap();
    }

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

    public function setDensityMap(){
        $this->densityMap = $this->size * $this->size * $this->density / 100;
    }

    public function getGuards(){

        return $this->guards;

    }

    public function setGuards($guards){

        $this->guards = $guards;
        
    }



    public function generate()
    {
        // $this->map = array_fill(0, $this->size * $this->size, ['status' => false, 'obj'=> 0, 'img' => '/img/flyweight/castle.gif']);
        $this->map = array_fill(0, $this->size, array_fill(0, $this->size, ['status' => false, 'obj'=> 0, 'img' => '']));
        $this->remainingMap = array_fill(0, $this->size, array_fill(0, $this->size, 1));

        $this->generateTowns();
        $this->generateObstacles();
        $this->generateGuards();

        return $this->map;
        // $vehicleName = "App\Entity\Factory\\"  .ucfirst($option);
        // $this->vehicle =  new $vehicleName();
        
    }

    private function generateTowns(){

        $title = TitleFactory::getTitle('town');
        
        
        for($i=0; $i < $this->towns; $i++){
            $generatedTitle =  $title->generateTitle(Self::TOWNS[array_rand(Self::TOWNS)]);
            $this->setPosition($generatedTitle);

        }      
    }

    private function generateObstacles(){

        $title = TitleFactory::getTitle('obstacle');

        for($i=0; $i < $this->densityMap; $i++){
            $generatedTitle =  $title->generateTitle(Self::OBSTACLE[array_rand(Self::OBSTACLE)]);
            $this->setPosition($generatedTitle);

        } 
  
    }

    private function generateGuards(){

        $title = TitleFactory::getTitle('guard');
        for($i=0; $i < $this->densityMap; $i++){
            
            $generatedTitle =  $title->generateTitle($this->getRandomGuard());
            $this->setPosition($generatedTitle);

        } 

    }

    private function setPosition($generatedTitle){

        $xPos = array_rand($this->remainingMap);
        $x = $this->remainingMap[$xPos];
        while(!$x){
            $xPos = array_rand($this->remainingMap);
            $x = $this->remainingMap[$xPos];
        }

        $yPos = array_rand($x);

        unset($this->remainingMap[$xPos][$yPos]);

        $this->map[$xPos][$yPos] = $generatedTitle;

    }

    private function getRandomGuard(){

        $int = Self::GUARDLIST[Self::GUARDS[$this->guards]];
        $guard =  $int[array_rand($int)];

        return $guard;

    }

    
}