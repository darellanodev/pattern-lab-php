<?php

namespace App\Structural\Decorator\Pizza;

class HamDecorator extends PizzaDecorator
{
    public function getDescription()
    {
        return $this->pizza->getDescription().', ham';
    }

    public function getCost()
    {
        return $this->pizza->getCost() + 3;
    }
}
