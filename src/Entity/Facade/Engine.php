<?php

namespace App\Entity\Facade;

use App\Entity\Facade\OilSensor;
use App\Entity\Facade\FuelSensor;
use App\Entity\Facade\TemperatureSensor;
use App\Entity\Facade\FlapsSensor;
use App\Entity\Facade\LandingGear;

class Engine {


    public function __construct()
    {

        $this->oil = new OilSensor();
        $this->fuel = new FuelSensor();
        $this->temperature = new TemperatureSensor();
        $this->flaps = new FlapsSensor();
        $this->landingGear = new LandingGear();

    }

    public function getOil(){

        return $this->oil;

    }

    public function getFuel(){
        
        return $this->fuel;

    }
    
    public function getTemperature(){
        
        return $this->temperature;

    }

    public function getFlaps(){
        
        return $this->flaps;

    }

    public function getLandingGear(){
        
        return $this->landingGear;

    }

    public function start(){
        $array = [];
        $message = [['message' => "Initialize engine ... ", 'code'=>'']];
        $oil = $this->oil->checkOil();
        $fuel = $this->fuel->checkFuel();
        
        $array = array_merge($message, $oil, $fuel);
        
        return $array;
    }

    public function status(){

        $array = [];
        $message = [['message' => "Checking engine status ... ", 'code'=>'']];
        $oil = $this->oil->checkOil();
        $fuel = $this->fuel->checkFuel();
        $temperature = $this->temperature->checkTemperature();
        
        $array = array_merge($message, $oil, $fuel, $temperature);
        
        return $array;

    }

    public function land(){

        $array = [];
        $message = [['message' => "Initialize landing ... ", 'code'=>'']];
        $flaps = $this->flaps->checkFlaps();
        $landingGear = $this->landingGear->checkLandingGear();
        $array = array_merge($message, $flaps, $landingGear);
        
        return $array;
    }

}