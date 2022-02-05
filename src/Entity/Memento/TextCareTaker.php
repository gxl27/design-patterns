<?php

namespace App\Entity\Memento;


class TextCareTaker
{

    private $mementos = [];
    private $originator;

    public function __construct(OriginatorInterface $originator)
    {
        $this->originator = $originator;
    }

    public function backup(): void
    {

        $this->mementos[] = $this->originator->save();
    }

    public function undo(): void
    {
        if (!count($this->mementos)) {
            return;
        }
        $memento = array_pop($this->mementos);
        try {
            $this->originator->restore($memento);
        } catch (\Exception $e) {
            $this->undo();
        }
    }


    public function getMementos()
    {
        return $this->mementos;
    }
}