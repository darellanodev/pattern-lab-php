<?php

namespace App\Structural\Decorator\Pizza;

class SimplePizza implements Pizza
{
    public function getDescription()
    {
        return 'Simple pizza';
    }

    public function getCost()
    {
        return 5;
    }
}
