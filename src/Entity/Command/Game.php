<?php

namespace App\Entity\Command;

class Game{

    // home team
    public string $team1;
    //away team
    public string $team2;
    // bet for home team
    public int $bet1;
    //bet for away team
    public int $bet2;

    // mark the first bet
    /**
     * @var(type="integer", nullable=true)
     */
    public  $marked1;

    // mark the second bet
    /**
     * @var(type="integer", nullable=true)
     */
    public  $marked2;

    public function __construct($array)
    {
        $this->team1 = $array['team1'];
        $this->team2 = $array['team2'];
        $this->bet1 = $array['bet1'];
        $this->bet2 = $array['bet2'];
        $this->marked1 = 0;
        $this->marked2 = 0;
    }




    /**
     * Get the value of team1
     */ 
    public function getTeam1()
    {
        return $this->team1;
    }

    /**
     * Set the value of team1
     *
     * @return  self
     */ 
    public function setTeam1($team1)
    {
        $this->team1 = $team1;

        return $this;
    }

    /**
     * Get the value of team2
     */ 
    public function getTeam2()
    {
        return $this->team2;
    }

    /**
     * Set the value of team2
     *
     * @return  self
     */ 
    public function setTeam2($team2)
    {
        $this->team2 = $team2;

        return $this;
    }

    /**
     * Get the value of bet1
     */ 
    public function getBet1()
    {
        return $this->bet1;
    }

    /**
     * Set the value of bet1
     *
     * @return  self
     */ 
    public function setBet1($bet1)
    {
        $this->bet1 = $bet1;

        return $this;
    }

    /**
     * Get the value of bet2
     */ 
    public function getBet2()
    {
        return $this->bet2;
    }

    /**
     * Set the value of bet2
     *
     * @return  self
     */ 
    public function setBet2($bet2)
    {
        $this->bet2 = $bet2;

        return $this;
    }



    /**
     * Get the value of marked1
     */ 
    public function getMarked1()
    {
        return $this->marked1;
    }

    /**
     * Set the value of marked1
     *
     * @return  self
     */ 
    public function setMarked1(? bool $marked1)
    {
        $this->marked1 = $marked1;

        return $this;
    }

    /**
     * Get the value of marked2
     */ 
    public function getMarked2()
    {
        return $this->marked2;
    }

    /**
     * Set the value of marked2
     *
     * @return  self
     */ 
    public function setMarked2(? bool $marked2)
    {
        $this->marked2 = $marked2;

        return $this;
    }
}