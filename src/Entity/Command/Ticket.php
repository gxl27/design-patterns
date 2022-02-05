<?php

namespace App\Entity\Command;

class Ticket{

    // ticket games
    public $games;

    // bet amount
    public $sum;

    // games odds
    public $multiply;

    // potential win sum
    public $win;

    public function __construct($sum, $array)
    {

        $this->sum = $sum;
        foreach($array as $key => $game){
            if(!$game->getMarked1() && !$game->getMarked2()){
 
                unset($array[$key]);
            }
        }
        $this->games = array_values($array);
    }

    public function calculate(){
        $multiply = 1;
       
        foreach($this->games as $game){
            if($game->getMarked1()){
                $multiply *= $game->getBet1()/100;
            }
            if($game->getMarked2()){
                $multiply *= $game->getBet2()/100;
            }
            $this->multiply =  $multiply;
        }
        $this->multiply = $this->multiply * 100;
     
        $this->win = $this->multiply * $this->sum /100;
    }
}