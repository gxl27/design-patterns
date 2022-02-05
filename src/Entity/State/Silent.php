<?php

namespace App\Entity\State;

use App\Entity\State\MobileAlertInterface;

class Silent implements MobileAlertInterface {

    public function alert() {
        $response = "Telephone it's silent (no sound, no vibration)";
        
        return $response;
    }
}