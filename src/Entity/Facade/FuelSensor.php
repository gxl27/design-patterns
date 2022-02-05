<?php

namespace App\Entity\Facade;

class FuelSensor {

    const LIMITS = ['min' => 100,
            'normal' => 700,
            'max' => 1500];

    public $fuelValue; 

    public function __construct()
    {
        // initialize fuel level
        $this->fuelValue = 700;
    }

    public function checkFuel()
    {
        $message[0]['message'] = "Checking fuel level ... <br>";
        $message[0]['code'] = '';

        $result = "SUCCESS: Fuel value OK ($this->fuelValue l)";
        $code = 200;

        if($this->fuelValue <= SELF::LIMITS['min']){

            $result = "FAIL: Fuel value too low ($this->fuelValue l) , recharge";
            $code = 405;
        }

        if($this->fuelValue >= SELF::LIMITS['max']){

            $result = "FAIL: Fuel value too high ($this->fuelValue l) , the plane it's too heavy";
            $code = 406;
        }

        $message[1] = ['message' => $result, 'code' => $code];

        return $message;
    }


    /**
     * Get the value of fuelValue
     */ 
    public function getFuelValue()
    {
        return $this->fuelValue;
    }

    /**
     * Set the value of fuelValue
     *
     * @return  self
     */ 
    public function setFuelValue($fuelValue)
    {
        $this->fuelValue = $fuelValue;

        return $this;
    }
}