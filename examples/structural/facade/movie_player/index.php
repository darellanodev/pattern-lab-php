<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Helpers\ExampleLayout;
use App\Structural\Facade\MoviePlayer\Blinds;
use App\Structural\Facade\MoviePlayer\Lights;
use App\Structural\Facade\MoviePlayer\MovieModeFacade;
use App\Structural\Facade\MoviePlayer\Projector;
use App\Structural\Facade\MoviePlayer\SoundSystem;
use App\Structural\Facade\MoviePlayer\StreamingPlayer;

$movieMode = new MovieModeFacade(
    new Blinds(),
    new Projector(),
    new SoundSystem(),
    new Lights(),
    new StreamingPlayer()
);

$output = [];
$output[] = "\n🎬 Activating Movie Mode...";

foreach ($movieMode->activate('Interstellar') as $step) {
    $output[] = "   {$step}";
}

$output[] = "✅ All set, enjoy the movie!";

ExampleLayout::render(
    'Movie Player Example',
    'Facade Pattern Demo',
    'We have several devices that need to be coordinated: <strong>Blinds</strong>, <strong>Projector</strong>, <strong>SoundSystem</strong>, <strong>Lights</strong>, and <strong>StreamingPlayer</strong>.</p><p class="text-gray-300">The <strong>MovieModeFacade</strong> provides a single method to activate all of them in the right order, so the client doesn\'t need to know the details of each device.',
    $output
);
