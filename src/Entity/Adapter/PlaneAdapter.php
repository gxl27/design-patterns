<?php

namespace App\Entity\Adapter;

class PlaneAdapter {

    public $plane;

    public function __construct($plane)
    {
        $this->plane = $plane;
    }

    public function drive() {

        $result = "Adapter translated: " . $this->plane->fly();

        return $result;
        
    }

}