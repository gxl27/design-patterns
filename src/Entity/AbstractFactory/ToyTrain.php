<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\ToyInterface;

class ToyTrain implements ToyInterface {

    public function getPrice()
    {
        $result = 'Toy train price 75 euro';

        return $result;
    }

}