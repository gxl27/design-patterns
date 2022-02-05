<?php

namespace App\Entity\Chain;

class TwentyNote implements DispenseChain{

    public DispenseChain $chain;

    public function setNextChain(DispenseChain $chain)
    {
        $this->chain = $chain;        
    }

    public function dispense(Currency $currency)
    {
        $result = '';
        if($currency->getAmount() >= 20){
            $num = floor($currency->getAmount() / 20);
            $remainder = $currency->getAmount() % 20;
            
            $result .= "Dispensing ". $num . "* 20 ". $currency->getType(). " note <br>";

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