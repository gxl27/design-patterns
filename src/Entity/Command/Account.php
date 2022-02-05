<?php

namespace App\Entity\Command;

use Doctrine\Common\Collections\ArrayCollection;

class Account {

    private $bets;
    private int $ballance;

    public function __construct($ballance)
    {
        $this->ballance = $ballance;
        $this->bets = new ArrayCollection();
    }

    public function addCommand(BetInterface $bet)
    {
        $this->bets->add($bet);
    }

    public function placeBets(){
        $tickets = [];

        foreach($this->bets as $bet){
            array_push($tickets , $bet->execute());
        }
        $this->bets = new ArrayCollection();

        return $tickets;
    }


    /**
     * Get the value of ballance
     */ 
    public function getBallance()
    {
        return $this->ballance;
    }

    /**
     * Set the value of ballance
     *
     * @return  self
     */ 
    public function setBallance($ballance)
    {
        $this->ballance = $ballance;

        return $this;
    }
}