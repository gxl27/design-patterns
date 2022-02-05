<?php

namespace App\Entity\Iterator;


class AlphabeticalOrderIterator implements \Iterator {

    public $collection;

    public $position;

    public $reverse = false;

    public $length;
    
    public function __construct($collection, $reverse, $length)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
        $this->length = $length;
        
    }

    public function rewind()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
      
    }

    public function current()
    {


            $length = strlen($this->collection->getItems()[$this->position]);
         
            $minLenght = $this->length;
            
            // check if the item lenght it's less or equals than the submited length
            if($length < $minLenght)
            {
                return false;
            }
  



        return $this->collection->getItems()[$this->position];

    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    public function valid()
    {
        
        return isset($this->collection->getItems()[$this->position]);
    }

}