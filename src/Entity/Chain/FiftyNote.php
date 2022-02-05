<?php

namespace App\Entity\Chain;

class FiftyNote implements DispenseChain{

    public DispenseChain $chain;

    public function setNextChain(DispenseChain $chain)
    {
        $this->chain = $chain;        
    }

    public function dispense(Currency $currency)
    {
        $result = '';
        if($currency->getAmount() >= 50){
            $num = floor($currency->getAmount() / 50);
            $remainder = $currency->getAmount() % 50;
            
            $result .= "Dispensing ". $num . "* 50 ". $currency->getType(). " note <br>";

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