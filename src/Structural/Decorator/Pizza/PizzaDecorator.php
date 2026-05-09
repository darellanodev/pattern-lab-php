<?php

namespace App\Structural\Decorator\Pizza;

abstract class PizzaDecorator implements Pizza
{
    public function __construct(protected Pizza $pizza)
    {
    }

    public function getDescription()
    {
        return $this->pizza->getDescription();
    }

    public function getCost()
    {
        return $this->pizza->getCost();
    }
}
