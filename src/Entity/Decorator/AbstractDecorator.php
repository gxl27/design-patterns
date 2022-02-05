<?php

namespace App\Entity\Decorator;

use App\Entity\Decorator\GameInterface;

abstract class AbstractDecorator implements GameInterface{

    const GAMES = [
        0 => 'Solitaire',
        1 => 'Counterstrike',
        2 => 'Need for speed'
    ];

    const TYPE = [
        0 => 'Playstation',
        1 => 'Xbox',
        2 => 'Pc'
    ];

    public $game;
    public $type;

    public function __construct(GameInterface $game)
    {
        $this->game = $game;
    }

    abstract function start();

    public function addDecorator($game){

        $this->game = $game;

    }

    public function setType($type){

        $this->type = $type;

    }

}