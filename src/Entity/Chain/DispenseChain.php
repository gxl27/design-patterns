<?php

namespace App\Entity\Chain;

use App\Entity\Chain\Currency;

interface DispenseChain {

    function setNextChain(DispenseChain $chain);

    function dispense(Currency $currency);

}