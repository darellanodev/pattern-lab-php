<?php

namespace App\Structural\Facade\MoviePlayer;

class SoundSystem
{
    public function activate(string $mode): string
    {
        return "[Sound] Sound system activated in {$mode} mode.";
    }

    public function deactivate(): string
    {
        return '[Sound] Sound system deactivated.';
    }
}
