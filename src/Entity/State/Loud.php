<?php

namespace App\Entity\State;

use App\Entity\State\MobileAlertInterface;

class Loud implements MobileAlertInterface {

    public function alert() {
        $response = "Sound ON";
        
        return $response;
    }
}