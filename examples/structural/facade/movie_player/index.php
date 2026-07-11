<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

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

echo "\n🎬 Activating Movie Mode...\n";

foreach ($movieMode->activate('Interstellar') as $step) {
    echo "   {$step}\n";
}

echo "✅ All set, enjoy the movie!\n";
