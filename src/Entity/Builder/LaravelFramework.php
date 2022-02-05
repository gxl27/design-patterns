<?php

namespace App\Entity\Builder;



class LaravelFramework extends AbstractFrameworkBuilder{

    public function setFramework()
    {
        $this->framework = "Laravel";
    }

    public function setVersion()
    {
        $this->version = "5.6";
    }

    public function setLanguage()
    {
        $this->language = "PHP";
    }
 

}