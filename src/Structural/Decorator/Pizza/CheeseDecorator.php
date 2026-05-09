<?php

namespace App\Structural\Decorator\Pizza;

class CheeseDecorator extends PizzaDecorator
{
    public function getDescription()
    {
        return $this->pizza->getDescription().', cheese';
    }

    public function getCost()
    {
        return $this->pizza->getCost() + 1.5;
    }
}
