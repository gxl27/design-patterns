<?php

namespace App\Entity\Interpreter;

class LpkToGpm implements Converter
{
    private $l2g;
    private $k2m;

    public function __construct(Converter $l2g)
    {
        $this->l2g = $l2g;
        $this->k2m = new KmToMile(100);
    }

    public function convert()
    {
        $miles = $this->k2m->convert();
        $result = $this->l2g->convert();
        return $result. " / $miles";

    }
}