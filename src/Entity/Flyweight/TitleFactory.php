<?php

namespace App\Entity\Flyweight;

use App\Entity\Flyweight\TitleInterface;
use Doctrine\Common\Collections\ArrayCollection;

class TitleFactory {

    const TITLES = [
        0 => 'town',
        1 => 'guard',
        2 => 'obstacle'
    ];

    const TOWNS = [0 => 'castle',
                    1 => 'tower',
                    2 => 'conflux',
                    3 => 'necropolis'
                    ];

    public static $array = [];


    public static function getTitle($title)
    {
        // $title = NULL;
        
        if(array_key_exists($title, Self::$array)){
            $title = Self::$array[$title];

            return $title;

        }else {
            switch($title){
                case 'town':
                    $newTitle = new Town();
                    break;
                case 'guard':
                    $newTitle = new Guard();
                break;
                case 'obstacle':
                    $newTitle = new Obstacle();
                    break;
            }
            // array_push(Self::$array, [$title => $newTitle]);
            Self::$array[$title] = $newTitle;
        }
     

        return $newTitle;
    }

}