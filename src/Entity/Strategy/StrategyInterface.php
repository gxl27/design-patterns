<?php

namespace App\Entity\Strategy;

use App\Entity\Strategy\City;

Interface StrategyInterface {

    public function dispayInfo(City $city);
}