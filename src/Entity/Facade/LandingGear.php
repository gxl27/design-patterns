<?php

namespace App\Entity\Facade;

class LandingGear {

    const LIMITS = ['close' => 0,
            'open' => 1];

    public $landingGear; 

    public function __construct()
    {
        // initialize normal flaps value
        $this->landingGear = 1;
    }

    public function checkLandingGear()
    {
        $message[0]['message'] = "Checking landing gear position ... <br>";
        $message[0]['code'] = '';

        $result = "SUCCESS: landing gear are opened (OK)";
        $code = 200;

        if($this->landingGear == SELF::LIMITS['close']){

            $result = "FAIL: landing gear it's closed! MUST BE OPEN";
            $code = 408;
        }

        $message[1] = ['message' => $result, 'code' => $code];

        return $message;
    }


    /**
     * Get the value of landingGear
     */ 
    public function getLandingGear()
    {
        return $this->landingGear;
    }

    /**
     * Set the value of landingGear
     *
     * @return  self
     */ 
    public function setLandingGear($landingGear)
    {
        $this->landingGear = $landingGear;

        return $this;
    }
}