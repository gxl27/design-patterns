<?php

namespace App\Entity\Flyweight;

use App\Entity\Flyweight\TitleInterface;

class Town implements TitleInterface {

    public $obj;

    public function __construct()
    {
        // extrinsec type
        $this->obj = 1;

    }

    public function generateTitle($type)
    {
        $result = [];
        $result['obj'] = $this->obj;
        $result['type'] = "town";
        $result['img'] = "/img/flyweight/".$type.".gif";

        return $result;
    }

}