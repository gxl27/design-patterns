<?php

namespace App\Entity\Builder;



class SymfonyFramework extends AbstractFrameworkBuilder{

    public function setFramework()
    {
        $this->framework = "Symfony";
    }

    public function setVersion()
    {
        $this->version = "5.1";
    }

    public function setLanguage()
    {
        $this->language = "PHP";
    }


 

}