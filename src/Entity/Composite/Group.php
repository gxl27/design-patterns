<?php

namespace App\Entity\Composite;

use Doctrine\Common\Collections\ArrayCollection;

class Group extends Component{



    public $children;

    public function __construct($type)
    {
        $this->children = new ArrayCollection();
        $this->type = $type;
    }

    public function operation(){
        $results = "<tr class='group font-bold'><td colspan='4'>".$this->type." class</td></tr>
        <tr><td>Stundent name</td><td>Status</td><td>Grades</td><td>Average</td></tr>";
        foreach ($this->children as $child) {
            $results .= $child->operation();
        }

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