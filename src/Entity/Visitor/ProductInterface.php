<?php

namespace App\Entity\Visitor;

use App\Entity\Visitor\ShopingCartVisitorImpl;

interface ProductInterface {

    public function accept(ShopingCartVisitorImpl $v);

}