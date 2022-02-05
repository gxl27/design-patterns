<?php

namespace App\Entity\Proxy;

use phpDocumentor\Reflection\Types\Self_;

class WebsiteList {

    public const LIST = [
        0 => ['name' => 'Ennja - Away', 'link' => 'https://www.youtube.com/embed/8AqWHAy0OT8', 'status' => 1 ],
        1 => ['name' => 'Stoto - Still Can t Sleep', 'link' => 'https://www.youtube.com/embed/BMFuWNcjGk0', 'status' => 1 ],
        2 => ['name' => 'SANDU CIORBA - PIRATU (NOU 2015)', 'link' => 'https://www.youtube.com/embed/bczm0-AsEeM', 'status' => 0 ],
    ];

    public static function getStatus($id) {

        if(Self::LIST[$id]['status']){
            return true;
        }

        return false;
        
    }

}