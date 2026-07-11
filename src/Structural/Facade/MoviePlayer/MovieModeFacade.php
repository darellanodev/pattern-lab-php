<?php

namespace App\Structural\Facade\MoviePlayer;

class MovieModeFacade
{
    public function __construct(
        private Blinds $blinds,
        private Projector $projector,
        private SoundSystem $sound,
        private Lights $lights,
        private StreamingPlayer $player
    ) {
    }

    public function activate(string $title): array
    {
        return [
            $this->blinds->lower(),
            $this->lights->turnOff(),
            $this->projector->turnOn(),
            $this->sound->activate('Cinema 5.1'),
            $this->player->play($title),
            $this->player->enableSubtitles('English'),
        ];
    }
}
