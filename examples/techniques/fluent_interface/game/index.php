<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Helpers\ExampleLayout;
use App\Techniques\FluentInterface\Game\Character;

$output = [];

$hero = new Character('Darian');
$hero->equip('Sword')->heal(20)->levelUp();
$output[] = $hero->status();

ExampleLayout::render(
    'Game Example',
    'Fluent Interface Pattern',
    'We have a <strong>Character</strong> with several actions that can be performed on it: <strong>equip</strong> an item, <strong>heal</strong> health points, and <strong>levelUp</strong>.</p><p class="text-gray-300">Each method returns <strong>$this</strong>, so calls can be chained together in a single, readable statement instead of writing separate lines for every action.',
    $output
);
