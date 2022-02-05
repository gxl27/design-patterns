<?php

namespace App\Entity\AbstractFactory;

use App\Entity\AbstractFactory\ToyInterface;

class ToyCar implements ToyInterface {

    public function getPrice()
    {
        $result = 'Toy car price 15 euro';

        return $result;
    }

}