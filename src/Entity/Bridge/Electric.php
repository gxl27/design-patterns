<?php

namespace App\Entity\Bridge;

use App\Entity\Bridge\EngineInterface;

class Electric implements EngineInterface {

    public $type;

    public function __construct()
    {
        $this->type = "Electric";
    }

    public function start () {

        $result = $this->type . " engine has started";

        return $result;

    }

    public function energy () {

        $result = $this->type . " uses only electric energy";

        return $result;

    }

}