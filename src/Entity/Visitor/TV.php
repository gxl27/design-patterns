<?php

namespace App\Entity\Visitor;


use App\Entity\Visitor\ProductInterface;


class TV implements ProductInterface {

    const PRODUCTS = [
        0 => ['name' => 'TV Samsung 123 cm, Multicolor',
              'price' => 1200],
        1 => ['name' => 'TV LG 160cm, OLED, HTML',
                'price' => 1750],
        2 => ['name' => 'TV Philips, 80cm, UltraHD, limited edition',
                'price' => 820]
    ];

    const TYPE = 'TV';

    public string $name;
    public int $price;
    public $quantity;

    public function __construct($id)
    {
   
        $this->name = Self::PRODUCTS[$id]['name'];
        $this->price = Self::PRODUCTS[$id]['price'];
    }

    public function accept(ShopingCartVisitorImpl $v)
    {
        return $v->tvCalculate($this);
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