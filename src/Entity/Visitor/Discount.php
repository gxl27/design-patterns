<?php

namespace App\Entity\Visitor;


class Discount {

    const DISCOUNTS = [
        'TV' => 10,
        'laptop' => 5,
        'fridge' => 0,
        'air conditioner' => 3
    ];

    public static function getDiscount(string $name){
        return Self::DISCOUNTS[$name];
    }

}