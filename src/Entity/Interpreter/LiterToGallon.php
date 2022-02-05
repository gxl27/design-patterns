<?php

namespace App\Entity\Interpreter;

class LiterToGallon implements Converter
{
    private $liter;

    public function __construct($liter)
    {
        $this->liter = $liter;
    }

    public function convert()
    {
        return round($this->liter * 0.26 , 2). " gallons";
    }

}