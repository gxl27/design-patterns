<?php

namespace App\Entity\Memento;


interface MementoInterface
{
    public function getName(): string;

    public function getDate(): string;

    public function getState(): string;

}