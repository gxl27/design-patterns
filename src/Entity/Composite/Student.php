<?php

namespace App\Entity\Composite;

use Doctrine\Common\Collections\ArrayCollection;

class Student extends Component{

    public $name;
    public $children;
 

    public function __construct($name)
    {
        $this->name = $name;
        $this->children = new ArrayCollection();
    }



    public function operation(){
        $status = $this->getStatus();

        if(!$status){
            $status['class']= "";
            $status['text']= "";
            $status['average']= "";

        }
        $class = "student text-".$status['class'];
        $results =" <tr class='".$class."'><td>$this->name</td>";
        $results .= "<td class=>".$status['text']."</td><td>";

        foreach ($this->children as $child) {
            $results  .= $child->operation();
        }

        $results .= "<td class='avg'>".$status['average']."</td></td></tr>";

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

    private function getStatus(){

        $sum = 0;

        foreach ($this->children as $child) {
            $sum  += $child->getValue();
        }

        $result = number_format($sum/sizeof($this->children),2);

   
        if($result >= 5) {
            $return = ['class' => 'success', 'text' => 'promoted', 'average' => $result];
            
            return $return;
        }else {
            $return = ['class' => 'alert', 'text' => 'unpromoted', 'average' => $result];
        
            return $return;
        }
    }

}