<?php

namespace App\Entity\Adapter;

class Plane {

    public $type;

    public function __construct()
    {
        $this->type = "plane";
    }

    public function fly() {

        $result = "You can fly very fast with this $this->type!";

        return $result;
    }

}