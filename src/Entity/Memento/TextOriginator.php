<?php

namespace App\Entity\Memento;


class TextOriginator implements OriginatorInterface
{

    protected $state;
    protected $text;

    public function doChanges($text){
        // custom implementation
        // change of state
        $this->state = sha1(random_bytes(12));
        $this->text = $text;
       
    }


    public function save(){

        return new ConcreteMemento($this->state, $this->text);
    }

    public function restore(MementoInterface $memento): void
    {
        $this->state = $memento->getState();
       
    }

}