<?php

namespace App\Entity\AbstractFactory;


abstract class AbstractFactory {

    const VEHICLES = [
        0 => 'Car',
        1 => 'Plane',
        2 => 'Train'
    ];

    const FACTORIES = [
        0 => 'Vehicle',
        1 => 'Toy',

    ];

    public $product;

    abstract function createProduct(string $option);

    abstract function display();

    public function getProduct(){

        return $this->product;

    }

}