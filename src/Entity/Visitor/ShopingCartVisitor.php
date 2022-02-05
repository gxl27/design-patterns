<?php

namespace App\Entity\Visitor;


interface ShopingCartVisitor {

    public function tvCalculate(TV $tv);
    public function laptopCalculate(Laptop $laptop);
    public function fridgeCalculate(Fridge $fridge);
    public function airCalculate(AirConditioner $fridge);

}