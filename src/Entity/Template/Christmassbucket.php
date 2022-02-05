<?php

namespace App\Entity\Template;


class Christmassbucket extends AbstractMenu{


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
        return "2 chicken wrapper + 7 hot wings + 5 crispy strips <br>";
    }

}