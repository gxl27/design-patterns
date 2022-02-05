<?php

namespace App\Entity\Visitor;


use App\Entity\Visitor\ProductInterface;
use App\Entity\Visitor\AirConditionerVisitor;

class AirConditioner implements ProductInterface {

    const PRODUCTS = [
        0 => ['name' => 'Air conditioner Samsung summer edition',
              'price' => 790],
        1 => ['name' => 'Air conditioner Philips 2200w - eco',
                'price' => 1180],
    ];

    public string $name;
    public int $price;
    public $quantity;
    const TYPE = 'air conditioner';

    public function __construct($id)
    {
        $this->name = Self::PRODUCTS[$id]['name'];
        $this->price = Self::PRODUCTS[$id]['price'];
    }

    public function accept(ShopingCartVisitor $v)
    {
        return $v->airCalculate($this);
    }
    


    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}