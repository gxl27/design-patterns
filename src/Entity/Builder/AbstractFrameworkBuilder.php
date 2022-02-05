<?php

namespace App\Entity\Builder;

use App\Entity\Builder\BuilderInterface;

abstract class AbstractFrameworkBuilder implements BuilderInterface{

    const FRAMEWORKS = [
        0 => 'Symfony',
        1 => 'Laravel',
        2 => 'Django',
        3 => 'Angular'
    ];

    const WEBSITES = [
        0 => 'Streaming platform',
        1 => 'Personal webpage',
        2 => 'Business application',
        3 => 'Online Shop'
    ];


    public $framework;
    public $version;
    public $language;


    // builder interface methods
    public function simpleBuild()
    {
        $this->setFramework();
        
    }

    public function detaliedBuild()
    {
        $this->setFramework();
        $this->setVersion();
        $this->setLanguage();

    }

    // reset function and build function
    public function reset() {
        $this->framework = NULL;
        $this->version = NULL;
        $this->language = NULL;
    }

    public function build() {

        $result = "Recomandated framework : ". $this->getFramework();


        if($this->getVersion()){
            $result .= "(version : " . $this->getVersion() . ") - ";
        }

        if($this->getLanguage()){
            $result .= $this->getLanguage();
        }

       

        return $result;
    }
    
    abstract public function setFramework();

    abstract public function setVersion();

    abstract public function setLanguage();

    public function getFramework(){

        return $this->framework;

    }

    public function getVersion(){

        return $this->version;

    }

    public function getLanguage(){

        return $this->language;

    }

}