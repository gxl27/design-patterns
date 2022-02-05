<?php

namespace App\Entity\Mediator;

use Doctrine\Common\Collections\ArrayCollection;


class UserImpl extends User{

    const USERS = ['Mariah', 'Elena', 'Jennifer', 'David'];

    protected ChatMediator $mediator;
    protected $name;
    public $msgList;

    public function __construct(ChatMediator $med, $name)
    {
       
        $this->mediator = $med;
        $this->name = $name;
        $this->msgList = new ArrayCollection();

    }

    public function send($msg){

        $this->mediator->sendMessage($msg, $this);

    }

    public function recive(User $user, $msg){

        $this->addMsg($user, $msg);

    }

    public function addMsg($user, $msg){

        $msg = "Message from ". $user->getName() . " : ". $msg;
        if (!$this->msgList->contains($msg)) {
            $this->msgList[] = $msg;
        }

    }

    public function getName(){

        return $this->name;

    }
    

}