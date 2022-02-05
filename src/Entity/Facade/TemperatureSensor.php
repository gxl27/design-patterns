<?php

namespace App\Entity\Facade;

class TemperatureSensor {

    const LIMITS = ['min' => 90,
            'normal' => 110,
            'max' => 150];

    public $temperatureValue; 

    public function __construct()
    {
        // initialize normal oil value
        $this->temperatureValue = 110;
    }

    public function checkTemperature()
    {
        $message[0]['message'] = "Checking engine's temperature ... <br>";
        $message[0]['code'] = '';

        $result = "SUCCESS: Temperature value OK ($this->temperatureValue °C)";
        $code = 200;


        if($this->temperatureValue <= SELF::LIMITS['min']){

            $result = "FAIL: Temperature value too low ($this->temperatureValue °C)";
            $code = 403;

        }

        if($this->temperatureValue >= SELF::LIMITS['max']){

            $result = "FAIL: Temperature value too high ($this->temperatureValue °C)";
            $code = 404;

        }

        $message[1] = ['message' => $result, 'code' => $code];

        return $message;
    }


    /**
     * Get the value of temperatureValue
     */ 
    public function getTemperatureValue()
    {
        return $this->temperatureValue;
    }

    /**
     * Set the value of temperatureValue
     *
     * @return  self
     */ 
    public function setTemperatureValue($temperatureValue)
    {
        $this->temperatureValue = $temperatureValue;

        return $this;
    }
}