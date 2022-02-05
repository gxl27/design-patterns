<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\EngineInterface;

class Diesel implements EngineInterface {

    public $type;

    public function __construct()
    {
        $this->type = "Diesel";
    }

    public function start () {

        $result = $this->type . " engine has started";

        return $result;

    }

    public function energy () {

        $result = $this->type . " uses diesel energy";

        return $result;

    }

}