<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Helpers\ExampleLayout;
use App\Structural\Decorator\Pizza\CheeseDecorator;
use App\Structural\Decorator\Pizza\HamDecorator;
use App\Structural\Decorator\Pizza\SimplePizza;

$pizza = new SimplePizza();
$pizza = new CheeseDecorator($pizza);
$pizza = new HamDecorator($pizza);

$output = [];
$output[] = $pizza->getDescription();
$output[] = $pizza->getCost();

ExampleLayout::render(
    'Pizza Example',
    'Decorator Pattern Demo',
    'We have a basic <strong>SimplePizza</strong> that gives us a description and a price.</p><p class="text-gray-300">Now we want to add extras like <strong>cheese</strong> or <strong>ham</strong> without changing the original pizza class. We create <strong>decorators</strong> that wrap the pizza and add their own extras on top. This way we can combine any toppings we want.',
    $output
);
