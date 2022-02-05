<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\EngineInterface;

class Hybride implements EngineInterface {

    public $type;

    public function __construct()
    {
        $this->type = "Hybride";
    }

    public function start () {

        $result = $this->type . " engine has started";

        return $result;

    }

    public function energy () {

        $result = $this->type . " uses both diesel and electric energy";

        return $result;

    }

}