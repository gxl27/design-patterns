<?php

namespace App\Entity\Builder;



class DjangoFramework extends AbstractFrameworkBuilder{

    public function setFramework()
    {
        $this->framework = "Django";
    }

    public function setVersion()
    {
        $this->version = "4.0";
    }

    public function setLanguage()
    {
        $this->language = "Python";
    }
 

}