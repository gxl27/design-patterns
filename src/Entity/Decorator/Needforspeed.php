<?php

namespace App\Entity\Decorator;

class Needforspeed implements GameInterface {

    public function start() {

        $result = "The Need for speed game has started! Get ready to drive!";

        return $result;
        
    }

}