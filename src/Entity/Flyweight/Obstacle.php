<?php

namespace App\Entity\Flyweight;

use App\Entity\Flyweight\TitleInterface;

class Obstacle implements TitleInterface {

    public $obj;

    public function __construct()
    {
        // extrinsec type
        $this->obj = 3;

    }

    public function generateTitle($type)
    {
        $result = [];
        $result['type'] = $this->obj;
        $result['type'] = $type;
        $result['img'] = "/img/flyweight/".$type.".jpg";

        return $result;
    }

}