<?php

namespace App\Entity\Chain;

class Currency {

    const TYPE = [
        0 => 'euro',
        1 => 'dollar',
        2 => 'lei'
    ];

    public $amount;
    public $type;

    public function __construct($amount, $type)
    {
        $this->amount = $amount;
        $this->type = $type;
    }

    public function getAmount() {

        return $this->amount;
        
    }

    public function getType() {

        return Self::TYPE[$this->type];

    }

    public function setAmount(int $amount){
        // this it's for dispenser to change the remaining amount

        $this->amount = $amount;
    }

}