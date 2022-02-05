<?php

namespace App\Entity\Mediator;

use Doctrine\Common\Collections\ArrayCollection;

class ChatMediatorImpl implements ChatMediator {

    private $list;

    public function __construct()
    {
        $this->list = new ArrayCollection();
    }
    public function sendMessage($msg, User $user){
  
        $arr = $this->list->toArray();
  
        foreach ($arr as $item) {

            if(!($item == $user)){

                $item->recive($user, $msg);
            }
        }

    }

    public function addUser(User $user){

        if (!$this->list->contains($user)) {
            $this->list[] = $user;
        }

    }
    
}