<?php

namespace App\Entity\Template;


abstract class AbstractMenu {

    const MENU = [
        0 => 'Smart Menu',
        1 => 'Snack Box',
        2 => 'Twister',
        3 => 'Christmass bucket',
        4 => 'Bucket for all'
    ];

    const DELIVERY = [
        0 => 'here',
        1 => 'takeaway'
    ];

    const DRINKS = [
        0 => 'cola',
        1 => 'fanta',
        2 => 'sprite'
    ];


    public final function processOrder($drink, $delivery){

        // type = small / medium / large (different for every menu)
        $fries = $this->getFriesType();
        // type = small / medium / large (different for every menu)
        $drinks = $this->getDrinksType();

        $chicken = $this->getChicken();

        $result = $fries . $drinks. Self::DRINKS[$drink]. "<br>"  . $chicken . Self::DELIVERY[$delivery];

        return $result;

    }

    abstract function getChicken();
    abstract function getFriesType();
    abstract function getDrinksType();

    
}