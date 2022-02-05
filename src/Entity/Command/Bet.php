<?php

namespace App\Entity\Command;

use App\Entity\Command\BetInterface;
use App\Entity\Command\Stock;
use App\Entity\Command\Ticket;

class Bet implements BetInterface{

    private $ticket;

    public function __construct($sum, $games)
    {
        $this->ticket = new Ticket($sum, $games);
    }

    public function execute()
    {
        // calculate the winning sum
        $this->ticket->calculate();

        // return the ticket
        return $this->ticket;
    }

}