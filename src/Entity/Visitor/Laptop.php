<?php

namespace App\Entity\Visitor;


use App\Entity\Visitor\ProductInterface;
use App\Entity\Visitor\VisitorInterface;
use App\Entity\Visitor\LaptopVisitor;

class Laptop implements ProductInterface {

    const PRODUCTS = [
        0 => ['name' => 'Laptop Lenovo I9, 4gb, DDR4, HDD 10TB',
              'price' => 2350],
        1 => ['name' => 'Laptop Republic of gamming I9, 8gb, HDD 8TB',
                'price' => 2199],
        2 => ['name' => 'IMAC , 4gb, SSD 1TB',
                'price' => 3499],
        3 => ['name' => 'Laptop Intel - special edition, windows 11, black',
                'price' => 2699],
    ];

    public string $name;
    public int $price;
    public $quantity;
    const TYPE = 'laptop';

    public function __construct($id)
    {
        $this->name = Self::PRODUCTS[$id]['name'];
        $this->price = Self::PRODUCTS[$id]['price'];
    }

    public function accept(ShopingCartVisitorImpl $v)
    {
        return $v->laptopCalculate($this);
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