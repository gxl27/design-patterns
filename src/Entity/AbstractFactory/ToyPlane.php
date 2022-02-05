<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\ToyInterface;

class ToyPlane implements ToyInterface {

    public function getPrice()
    {
        $result = 'Toy plane price 150 euro';

        return $result;
    }

}