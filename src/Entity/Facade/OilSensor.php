<?php

namespace App\Entity\Facade;

class OilSensor {

    const LIMITS = ['min' => 5,
            'normal' => 7,
            'max' => 10];

    public $oilValue; 

    public function __construct()
    {
        // initialize normal oil value
        $this->oilValue = 7;
    }

    public function checkOil()
    {
        $message[0]['message'] = "Checking oil presure ... <br>";
        $message[0]['code'] = '';

        $result = "SUCCESS: Oil value OK ($this->oilValue bars)";
        $code = 200;
        
        if($this->oilValue <= SELF::LIMITS['min']){

            $result = "FAIL: Oil value too low ($this->oilValue bars)";
            $code = 400;
        }

        if($this->oilValue >= SELF::LIMITS['max']){

            $result = "FAIL: Oil value too high ($this->oilValue bars)";
            $code = 401;
        }

        $message[1] = ['message' => $result, 'code' => $code];

        return $message;
    }


    /**
     * Get the value of oilValue
     */ 
    public function getOilValue()
    {
        return $this->oilValue;
    }

    /**
     * Set the value of oilValue
     *
     * @return  self
     */ 
    public function setOilValue($oilValue)
    {
        $this->oilValue = $oilValue;

        return $this;
    }
}