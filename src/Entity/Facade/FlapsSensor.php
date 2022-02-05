<?php

namespace App\Entity\Facade;

class FlapsSensor {

    const LIMITS = ['close' => 0,
            'open' => 1];

    public $flapsValue; 

    public function __construct()
    {
        // initialize normal flaps value
        $this->flapsValue = 0;
    }

    public function checkFlaps()
    {
        $message[0]['message'] = "Checking flaps position ... <br>";
        $message[0]['code'] = '';

        $result = "SUCCESS: flaps are opened (OK)";
        $code = 200;


        if($this->flapsValue == SELF::LIMITS['close']){

            $result = "FAIL: Flaps are down! MUST BE OPEN";
            $code = 407;

        }

        $message[1] = ['message' => $result, 'code' => $code];

        return $message;
    }


    /**
     * Get the value of flapsValue
     */ 
    public function getFlapsValue()
    {
        return $this->flapsValue;
    }

    /**
     * Set the value of flapsValue
     *
     * @return  self
     */ 
    public function setFlapsValue($flapsValue)
    {
        $this->flapsValue = $flapsValue;

        return $this;
    }
}