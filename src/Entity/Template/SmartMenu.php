<?php

namespace App\Entity\Template;


class SmartMenu extends AbstractMenu{


    public function getFriesType()
    {
        return "Small french fries <br>";
    }

    public function getDrinksType()
    {
        return "Drink : Small ";
    }

    public function getChicken()
    {
        return "3 wings + 2 crispy strips <br>";
    }

}