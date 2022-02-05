<?php

namespace App\Entity\Observer;

use App\Entity\Observer\Event;

class MobileUserObserver implements \SplObserver, UserInterface
{
    protected $name;
    protected $status;
    protected $message;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->status = true;
    }

    public function display($message){

        $this->message = "$message";

    }

    public function update(\SplSubject $event){
         $this->display($event->message);
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
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