<?php

namespace App\Entity\Memento;

use App\Entity\Memento\MementoInterface;

interface OriginatorInterface
{
    function save();
    function restore(MementoInterface $memento);
}