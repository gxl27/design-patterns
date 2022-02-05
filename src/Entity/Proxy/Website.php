<?php

namespace App\Entity\Proxy;

use App\Entity\Proxy\RequestInterface;
use App\Entity\Proxy\WebsiteList;

class Website implements RequestInterface {


    public function request($id) {

        $link = WebsiteList::LIST[$id]['link'];
        $result = "<iframe width='560' height='315' src=$link title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";

        return $result;
        
    }

}