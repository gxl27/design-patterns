# Classic Design Patterns (Symfony framework)

Here are all 23 oop design patterns with Symfony adaptation.

## Contents

1. [Overview](#overview)
1. [Install](#install)
1. [Basic Usage](#basic-usage)
1. [Testing](#testing)

## Overview

This repository contains exemples and common usage of different patterns in software developement.
With simple solutions for some complex problems, like shopping carts, broadcasting messages, caching objects, its services can be easy modified and integrated in any application. It was developed by Lucian Turlea

## Install

For installation, it requires only composer package management, no database, no js compiler!
So clone the repository and install the package with composer.

```bash
git clone https://github.com/gxl27/design-patterns.git;
cd design-patterns;
composer install;
```


## Basic Usage

Every pattern has his own route and controller, with also, one or more form types to handle the input.
Basicaly, the controller uses the specific pattern service and render the result. Here it's a small issue of the implementation of this project: because the application was design from the start with no requirement of any database, it has only constants in the services classes. So, i placed all the services inside entity folder and that it's not the best practice. I did that because the services contains the logic and the "model" of the application. Usually controller should get the model from the database and should use the services from "App\Services" namespace. Here it's an example:

```php
<?php

namespace App\Entity\Facade;

use App\Entity\Facade\OilSensor;
use App\Entity\Facade\FuelSensor;
use App\Entity\Facade\TemperatureSensor;
use App\Entity\Facade\FlapsSensor;
use App\Entity\Facade\LandingGear;

class Engine {


    public function __construct()
    {

        $this->oil = new OilSensor();
        $this->fuel = new FuelSensor();
        $this->temperature = new TemperatureSensor();
        $this->flaps = new FlapsSensor();
        $this->landingGear = new LandingGear();

    }

    public function getOil(){

        return $this->oil;

    }

    public function getFuel(){
        
        return $this->fuel;

    }
    
    public function getTemperature(){
        
        return $this->temperature;

    }

    public function getFlaps(){
        
        return $this->flaps;

    }

    public function getLandingGear(){
        
        return $this->landingGear;

    }

    public function start(){
        $array = [];
        $message = [['message' => "Initialize engine ... ", 'code'=>'']];
        $oil = $this->oil->checkOil();
        $fuel = $this->fuel->checkFuel();
        
        $array = array_merge($message, $oil, $fuel);
        
        return $array;
    }

    public function status(){

        $array = [];
        $message = [['message' => "Checking engine status ... ", 'code'=>'']];
        $oil = $this->oil->checkOil();
        $fuel = $this->fuel->checkFuel();
        $temperature = $this->temperature->checkTemperature();
        
        $array = array_merge($message, $oil, $fuel, $temperature);
        
        return $array;

    }

    public function land(){

        $array = [];
        $message = [['message' => "Initialize landing ... ", 'code'=>'']];
        $flaps = $this->flaps->checkFlaps();
        $landingGear = $this->landingGear->checkLandingGear();
        $array = array_merge($message, $flaps, $landingGear);
        
        return $array;
    }

}
```
Here it's the Facade serice that uses the subsystem classes. Because in this case the Facade class it's in the same directory with the other classes, it can have no "use" service.


## Testing
 
This application includes also the tests (default Symfony PHPUnit bundle) for each controller.
It checks if the pages are rendered, and with the Crawler, it makes a request of the forms. To run the test use the console/terminal in the project directory.

```bash
php bin/phpunit
```

The result should be the following:

```bash

PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Testing 
.AbstractFactoryControllerTest - testRenderPage
.AbstractFactoryControllerTest - testSubmitForm
.AbstractFactoryControllerTest - testSubmitedFormResult
.AdapterControllerTest - testRenderPage
...
.TemplateControllerTest - testSubmitForm
. 65 / 68 ( 95%)
TemplateControllerTest - testSubmitedFormResult
.VisitorControllerTest - testRenderPage
.VisitorControllerTest - testSubmitForm
.                                                               68 / 68 (100%)VisitorControllerTest - testSubmitedFormResult


Time: 00:05.660, Memory: 50.50 MB

OK (68 tests, 155 assertions)

```