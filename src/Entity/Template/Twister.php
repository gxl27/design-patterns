<?php

namespace App\Entity\Template;


class Twister extends AbstractMenu{


    public function getFriesType()
    {
        return "Medium french fries <br>";
    }

    public function getDrinksType()
    {
        return "Drink : Medium ";
    }

    public function getChicken()
    {
        return "1 chicken wrapper <br>";
    }

}