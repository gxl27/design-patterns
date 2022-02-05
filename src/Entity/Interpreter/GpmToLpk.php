<?php

namespace App\Entity\Interpreter;

class GpmToLpk implements Converter
{
    private $g2l;
    private $m2k;

    public function __construct(Converter $g2l)
    {
        $this->g2l = $g2l;
        $this->m2k = new MileToKm(100);
    }

    public function convert()
    {
        $km = $this->m2k->convert();
        $result = $this->g2l->convert();
        return $result. " / $km";

    }
}