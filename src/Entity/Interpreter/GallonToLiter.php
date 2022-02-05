<?php

namespace App\Entity\Interpreter;

class GallonToLiter implements Converter
{
    private $gallon;

    public function __construct($gallon)
    {
        $this->gallon = $gallon;
    }

    public function convert()
    {
        return round($this->gallon * 3.79 , 2). " liters";
    }

}