<?php

namespace App\Entity\Template;


class Bucketforall extends AbstractMenu{


    public function getFriesType()
    {
        return "Large french fries <br>";
    }

    public function getDrinksType()
    {
        return "Drink : Large ";
    }

    public function getChicken()
    {
        return "12 hot wings + 10 crispy strips <br>";
    }

}