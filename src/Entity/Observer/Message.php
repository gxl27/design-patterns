<?php

namespace App\Entity\Observer;

use App\Entity\Observer\Event;

class Message extends Event
{
    public $message;

    public function __construct($message)
    {
        parent::__construct();
        $this->message = $message;
    }



    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}