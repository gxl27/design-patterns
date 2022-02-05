<?php

namespace App\Entity\Composite;

use Doctrine\Common\Collections\ArrayCollection;

class Catalogue extends Component{

    public $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();

    }

    public function operation(){
        $results = "<table>";
        foreach ($this->children as $child) {
            $results .= $child->operation();
        }
        $results .= "</table>";
        return $results;
    }

    public function addChildren(Component $component){
        if (!$this->children->contains($component)) {
            $this->children[] = $component;
        }

    }

    public function isComposite(): bool
    {
        return true;
    }

}