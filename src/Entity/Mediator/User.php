<?php

namespace App\Entity\Mediator;

abstract class User{

    protected ChatMediator $mediator;
    protected $name;

    public function __construct(ChatMediator $med, $name)
    {
        $this->mediator = $med;
        $this->name = $name;

    }

    abstract function send($msg);
    abstract function recive(User $user, $msg);
    

}