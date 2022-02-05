<?php

namespace App\Entity\Chain;

class HundredNote implements DispenseChain{

    public DispenseChain $chain;

    public function setNextChain(DispenseChain $chain)
    {
        $this->chain = $chain;        
    }

    public function dispense(Currency $currency)
    {
        $result = '';
        if($currency->getAmount() >= 100){
            $num = floor($currency->getAmount() / 100);
            $remainder = $currency->getAmount() % 100;
            
            $result .= "Dispensing ". $num . "* 100 ". $currency->getType(). " note <br>";
            
            // dispense the remaining amount for the next object;
            $currency->setAmount($remainder);

            if($remainder != 0){
                $result .= $this->chain->dispense($currency);
            }

        }else{
            $result .= $this->chain->dispense($currency);
        }

        return $result;
    }

}