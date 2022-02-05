<?php

namespace App\Entity\Decorator;

class Counterstrike implements GameInterface {

    public $type;

    public function start() {

        $result = "The Counterstrike game has started! Buy your weapon!";

        return $result;
        
    }


}