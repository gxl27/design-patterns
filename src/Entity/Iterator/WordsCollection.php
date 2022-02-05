<?php

namespace App\Entity\Iterator;

class WordsCollection implements \IteratorAggregate {

    private $items = [];

    private $minLength = 0;

    public function __construct($array)
    {
        $this->items = $array;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function setMinLenght($minLength){
        $this->minLength = $minLength;
        return $this;
    }

    public function getIterator(): \Iterator
    {
        return new AlphabeticalOrderIterator($this, false, $this->minLength);
    }

    public function getReverseIterator(): \Iterator
    {
        return new AlphabeticalOrderIterator($this, true, $this->minLength);
    }
    
}