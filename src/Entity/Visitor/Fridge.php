<?php

namespace App\Entity\Visitor;


use App\Entity\Visitor\ProductInterface;
use App\Entity\Visitor\FridgeVisitor;

class Fridge implements ProductInterface {

    const PRODUCTS = [
        0 => ['name' => 'Fridge Electrolux 400l',
              'price' => 1699],
        1 => ['name' => 'Fridge Beko 870l',
                'price' => 3599]
    ];

    public string $name;
    public int $price;
    public $quantity;
    const TYPE = 'fridge';

    public function __construct($id)
    {
        $this->name = Self::PRODUCTS[$id]['name'];
        $this->price = Self::PRODUCTS[$id]['price'];
    }

    public function accept(ShopingCartVisitorImpl $v)
    {
        return $v->fridgeCalculate($this);
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