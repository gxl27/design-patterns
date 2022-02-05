<?php

namespace App\Entity\Mediator;

interface ChatMediator {

    public function sendMessage($msg, User $user);
    public function addUser(User $user);
    
}