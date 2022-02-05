<?php

namespace App\Entity\State;

use App\Entity\State\MobileAlertInterface;
use App\Entity\State\Loud;
use App\Entity\State\Vibration;
use App\Entity\State\Silent;

class Mobile {

    const STATES = [
        0 => 'Loud',
        1 => 'Vibration',
        2 => 'Silent'
    ];


    public MobileAlertInterface $state;

    public function __construct(MobileAlertInterface $state)
    {
        $this->state = $state;
    }
    

    public function alert() {

        return $this->state->alert();
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function transitionState($int){
        $stateNumber = $int % sizeof(Self::STATES);

        // create new state and set it to the mobile state
        $classname = "App\Entity\State\\"  .ucfirst(Self::STATES[$stateNumber]);
        $this->setState(new $classname());

    }
}