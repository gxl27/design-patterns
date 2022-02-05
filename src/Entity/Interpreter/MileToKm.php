<?php

namespace App\Entity\Interpreter;

class MileToKm implements Converter
{
    private $mile;

    public function __construct($mile)
    {
        $this->mile = $mile;
    }

    public function convert()
    {
        return round($this->mile * 1.6 , 2). " km";
    }

}