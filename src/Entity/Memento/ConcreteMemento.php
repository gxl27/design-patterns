<?php

namespace App\Entity\Memento;


class ConcreteMemento implements MementoInterface
{

    private $state;
    private $date;
    private $text;

    public function __construct(string $state, $text)
    {
        $this->state = $state;
        $this->text = $text;
        $this->date = date('Y-m-d H:i:s');
    }


    public function getState(): string
    {
        return $this->state;
    }


    public function getName(): string
    {
        return $this->date . " / (" . substr($this->state, 0, 9) . "...)";
    }

    public function getDate(): string
    {
        return $this->date;
    }


    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}