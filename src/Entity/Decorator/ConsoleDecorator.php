<?php

namespace App\Entity\Decorator;

use App\Entity\Decorator\AbstractDecorator;

class ConsoleDecorator extends AbstractDecorator{



    public function start(){

        $result = $this->game->start();
        $result .= "($this->type)";

        return $result;
    }

}