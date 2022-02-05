<?php

namespace App\Entity\Proxy;

use App\Entity\Proxy\RequestInterface;
use App\Entity\Proxy\WebsiteList;

class ProxyWebsite implements RequestInterface {


    public function request($id) {
        if(WebsiteList::getStatus($id)){
            $website = new Website();
            $result = $website->request($id);
        }else {
            $result = "This clip cannot be shown in this application. Sorry!";
        }

        return $result;
        
    }

}