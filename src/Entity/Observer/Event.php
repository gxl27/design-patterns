<?php

namespace App\Entity\Observer;


class Event implements \SplSubject {

    // list of users

    const PCUSERS = [
                    0 => 'Michael',
                    1 => 'John',
                    2 => 'Elvis'
    ];

    const MOBILEUSERS = [
        0 => 'Leonardo',
        1 => 'Sandra'
    ];

    const CUSTOMAPPUSERS = [
        0 => 'Monica',
        1 => 'Andrew',
        2 => 'Jennifer',
        3 => 'Mariah'
    ];


    protected $storage;

    public function __construct()
    {
        $this->storage = new \SplObjectStorage();
        
    }

    public function attach(\SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        if(!$this->storage->contains($observer)){
            return;
        }
        $this->storage->detach($observer);
    }

    public function notify(){
        foreach($this->storage as $observer){
            $observer->update($this);
        }
    }
}