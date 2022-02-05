<?php

namespace App\Entity\State;

use App\Entity\State\MobileAlertInterface;

class Vibration implements MobileAlertInterface {

    public function alert() {
        $response = "Vibration ON";

        return $response;
    }
}