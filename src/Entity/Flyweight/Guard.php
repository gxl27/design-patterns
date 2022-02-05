<?php

namespace App\Entity\Flyweight;

use App\Entity\Flyweight\TitleInterface;

class Guard implements TitleInterface {

    public $obj;

    public function __construct()
    {
        // extrinsec type
        $this->obj = 1;

    }

    public function generateTitle($type)
    {
        $result = [];
        $result['type'] = $this->obj;
        $result['type'] = $type;
        $result['img'] = "/img/flyweight/".$type.".gif";

        return $result;
    }

}