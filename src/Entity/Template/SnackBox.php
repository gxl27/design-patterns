<?php

namespace App\Entity\Template;


class SnackBox extends AbstractMenu{


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
        return "5 crispy strips <br>";
    }

}