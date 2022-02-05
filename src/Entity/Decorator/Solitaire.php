<?php

namespace App\Entity\Decorator;

class Solitaire implements GameInterface {

    public function start() {

        $result = "The Solitaire game has started! Prepare your cards";

        return $result;
        
    }

}