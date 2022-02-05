<?php

namespace App\Entity\Visitor;


use App\Entity\Visitor\TV;
use App\Entity\Visitor\Discount;

class ShopingCartVisitorImpl implements ShopingCartVisitor {

    // public TV $tv;

    public function tvCalculate(TV $tv)
    {
        if(!$tv->getQuantity()){
            return NULL;
        }
        $cart = [];

        $p = $tv->getPrice() * $tv->getQuantity();
        $discount = round($p * Discount::getDiscount($tv::TYPE) / 100);
        $price = $p - $discount;
        
        $cart['name'] = $tv->getName();
        $cart['type'] = $tv::TYPE;
        $cart['price'] = $tv->getPrice();
        $cart['quantity'] = $tv->getQuantity();
        $cart['discount'] = Discount::getDiscount($tv::TYPE);

        $cart['total'] = $price;

        return $cart;
    }

    public function laptopCalculate(Laptop $laptop)
    {
        if(!$laptop->getQuantity()){
            return NULL;
        }
        $cart = [];

        $p = $laptop->getPrice() * $laptop->getQuantity();
        $discount = round($p * Discount::getDiscount($laptop::TYPE) / 100);
        $price = $p - $discount;
        
        $cart['name'] = $laptop->getName();
        $cart['type'] = $laptop::TYPE;
        $cart['price'] = $laptop->getPrice();
        $cart['quantity'] = $laptop->getQuantity();
        $cart['discount'] = Discount::getDiscount($laptop::TYPE);

        $cart['total'] = $price;

        return $cart;
    }

    public function fridgeCalculate(Fridge $fridge)
    {
        if(!$fridge->getQuantity()){
            return NULL;
        }
        $cart = [];

        $p = $fridge->getPrice() * $fridge->getQuantity();
        $discount = round($p * Discount::getDiscount($fridge::TYPE) / 100);
        $price = $p - $discount;
        
        $cart['name'] = $fridge->getName();
        $cart['type'] = $fridge::TYPE;
        $cart['price'] = $fridge->getPrice();
        $cart['quantity'] = $fridge->getQuantity();
        $cart['discount'] = Discount::getDiscount($fridge::TYPE);

        $cart['total'] = $price;

        return $cart;
    }

    public function airCalculate(AirConditioner $air)
    {
        if(!$air->getQuantity()){
            return NULL;
        }
        $cart = [];

        $p = $air->getPrice() * $air->getQuantity();
        $discount = round($p * Discount::getDiscount($air::TYPE) / 100);
        $price = $p - $discount;
        
        $cart['name'] = $air->getName();
        $cart['type'] = $air::TYPE;
        $cart['price'] = $air->getPrice();
        $cart['quantity'] = $air->getQuantity();
        $cart['discount'] = Discount::getDiscount($air::TYPE);

        $cart['total'] = $price;

        return $cart;
    }

}