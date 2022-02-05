<?php

namespace App\Entity\Builder;



class AngularFramework extends AbstractFrameworkBuilder{

    public function setFramework()
    {
        $this->framework = "Angular";
    }

    public function setVersion()
    {
        $this->version = "7.0";
    }

    public function setLanguage()
    {
        $this->language = "JavaScript";
    }
 

}