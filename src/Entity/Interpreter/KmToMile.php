<?php

namespace App\Entity\Interpreter;

class KmToMile implements Converter
{
    private $km;

    public function __construct($km)
    {
        $this->km = $km;
    }

    public function convert()
    {
        return round($this->km * 0.62 , 2). " miles";
    }

}