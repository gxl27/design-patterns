<?php

namespace App\Entity\Composite;


class Grades extends Component{

    public $value;

    public function __construct()
    {
        $this->value = rand(2,9);
    }

    public function operation(){
        
        return "<span class='grade'>$this->value</span>";
    }

    public function getValue(){
        return $this->value;
    }


}